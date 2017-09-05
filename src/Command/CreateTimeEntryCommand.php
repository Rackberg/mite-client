<?php
/**
 * A console application that allows mite users to track their time.
 * Copyright (C) <2016>  <Lars Rackwitz-Rosenberg>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @file
 * Contains lrackwitz\mite\Command\CreateTimeEntryCommand.php.
 */

namespace lrackwitz\mite\Command;

use lrackwitz\mite\Entities\Resource\TimeEntry;
use lrackwitz\mite\Service\CommandHelper;
use lrackwitz\mite\Service\Manager\ProjectManager;
use lrackwitz\mite\Service\Manager\ServiceManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

/**
 * Class CreateTimeEntryCommand.
 *
 * @package lrackwitz\mite\Command
 */
class CreateTimeEntryCommand extends Command
{
    /**
     * The command helper.
     *
     * @var CommandHelper
     */
    private $commandHelper;

    /**
     * The project manager.
     *
     * @var \lrackwitz\mite\Service\Manager\ProjectManager
     */
    private $projectManager;

    /**
     * The service manager.
     *
     * @var \lrackwitz\mite\Service\Manager\ServiceManager
     */
    private $serviceManager;

    public function __construct(
        CommandHelper $commandHelper,
        ProjectManager $projectManager,
        ServiceManager $serviceManager
    )
    {
        $this->commandHelper = $commandHelper;
        $this->projectManager = $projectManager;
        $this->serviceManager = $serviceManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('time_entry:create')
            ->setDescription('Creates a new time entry.')
            ->setAliases(['create'])
            ->addOption(
                'date_at',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sets the date using format YYYY-MM-DD. Default is today.'
            )
            ->addOption(
                'minutes',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sets the minutes.',
                0
            )
            ->addOption(
                'note',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sets the note.'
            )
            ->addOption(
                'project_id',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sets the project id.'
            )
            ->addOption(
                'service_id',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sets the service id.'
            )
            ->addOption(
                'start_tracking',
                null,
                InputOption::VALUE_OPTIONAL,
                'Set this to 1 to start the tracking after creation.',
                0
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getOption('no-interaction')) {
            $options = $this->askQuestions($input, $output);

            $startTracking = $options['start_tracking'];
        } else {
            // We want to know if we should start the tracker after creation.
            $startTracking = $input->getOption('start_tracking');

            $options = $input->getOptions();
        }

        $options = array_filter($options, function ($value, $key) {
            if ($value == null || $key == 'start_tracking') {
                return false;
            }
            return true;
        }, ARRAY_FILTER_USE_BOTH);

        // Get the client.
        $client = $this->commandHelper->getClient();

        // Get the director.
        $director = $this->commandHelper->getDirector();

        // Get the factory.
        $factory = $this->commandHelper->getResourceBuilderFactory();

        // Add the time entry.
        $response = $client->addTimeEntry(
            isset($options['project_id']) ? $options['project_id'] : null,
            isset($options['service_id']) ? $options['service_id'] : null,
            isset($options['minutes']) ? $options['minutes'] : null,
            isset($options['note']) ? $options['note'] : null
        );

        if ($response && $response->getStatusCode() != 201) { // HTTP 201 = Created
            $output->writeln(
                '<error>Failed to create a new time entry!</error>'
            );

            return;
        }

        // Get the created time entry data.
        $data = json_decode($response->getBody()->getContents(), true);

        $timeEntryBuilder = $factory->createTimeEntryResourceBuilder();

        // Create a time entry object.
        /** @var TimeEntry $timeEntry */
        $timeEntry = $director->build(
            $timeEntryBuilder,
            $data['time_entry']
        );

        $successMessage = sprintf(
            'Created time entry (ID <info>%s</info>) starting at <info>%s minutes</info>',
            $timeEntry->getId(),
            $timeEntry->getMinutes()
        );

        if ($startTracking) {
            $trackerResponse = $client->startTracking($timeEntry);
            if ($trackerResponse->getStatusCode() != 200) {
                $output->writeln('<comment>Time entry created successfully but failed to start tracker. Please start the tracker manually.</comment>');
                return;
            }
            $successMessage .= ' and <info>started tracking</info>';
        }

        $output->writeln($successMessage . '.');
    }

    private function askQuestions(InputInterface $input, OutputInterface $output)
    {
        // Get the question helper.
        $helper = $this->getHelper('question');

        $suggested_minutes = $input->getOption('minutes') ?: 0;

        $minutes = $this->commandHelper->askForMinutes($input, $output, $helper, $suggested_minutes);

        $question = new ConfirmationQuestion(
            'Start tracking? [y|j, n] ',
            false,
            '/^(y|j)/i'
        );
        $startTracking = $helper->ask($input, $output, $question);

        // Summarize the options we defined so far.
        $options = [
            'minutes' => $minutes,
            'start_tracking' => $startTracking
        ];

        if ($suggested_minutes <= 0) {
            // Ask if we can send the request now.
            $question = new ConfirmationQuestion(
                'Execute now (without asking more questions)? [y|j, n] ',
                true,
                '/^(y|j)/i'
            );

            if ($helper->ask($input, $output, $question)) {
                return $options;
            }
        }

        // Ask for the project.
        $suggested_project_id = $input->getOption('project_id') ?: null;
        $suggested_project = null;
        if ($suggested_project_id) {
            $suggested_project = $this->projectManager->getProject(
                $suggested_project_id
            );
        }
        $project_id = $this->commandHelper->askForProject($input, $output, $helper, $suggested_project);

        // Ask for the service.
        $suggested_service_id = $input->getOption('service_id') ?: null;
        $suggested_service = null;
        if ($suggested_service_id) {
            $suggested_service = $this->serviceManager->getService($suggested_service_id);
        }
        $service_id = $this->commandHelper->askForService($input, $output, $helper, $suggested_service);

        // Ask for a note.
        $question = new Question('Take a note (or leave empty) ');
        $note = $helper->ask($input, $output, $question);
        $options = array_merge($options, [
            'project_id' => $project_id,
            'service_id' => $service_id,
        ]);
        if (!empty($note)) {
            $options['note'] = $note;
        }

        return $options;
    }
}
