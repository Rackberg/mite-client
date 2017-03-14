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
 * Contains lrackwitz\mite\Command\EditTimeEntryCommand.php.
 */
namespace lrackwitz\mite\Command;

use GuzzleHttp\Psr7\Request;
use lrackwitz\mite\Entities\Resource\TimeEntry;
use lrackwitz\mite\Service\CommandHelper;
use lrackwitz\mite\Service\MiteClient;
use lrackwitz\mite\Service\RequestFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

/**
 * Class EditTimeEntryCommand.
 *
 * @package lrackwitz\mite\Command
 */
class EditTimeEntryCommand extends Command
{
    /**
     * The command helper.
     *
     * @var CommandHelper
     */
    private $commandHelper;

    public function __construct(CommandHelper $commandHelper)
    {
        $this->commandHelper = $commandHelper;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('time_entry:edit')
            ->setDescription('Edit a time entry.')
            ->setAliases(['edit'])
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'The id of the time entry to edit.'
            )
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
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getOption('no-interaction')) {
            $options = $this->askQuestions($input, $output);
        } else {
            $options = $input->getOptions();
        }

        $options = array_filter($options, function ($value) {
            if ($value == null) {
                return false;
            }
            return true;
        });

        $id = $input->getArgument('id');

        $response = $this->commandHelper->getClient()
            ->editTimeEntry($id, $options);

        $output->writeln($response->getBody()->getContents());
    }

    private function askQuestions(InputInterface $input, OutputInterface $output)
    {
        // Get the question helper.
        $helper = $this->getHelper('question');

        // Get the current time entry.
        $timeEntry = $this->getTimeEntry($input->getArgument('id'));

        $options = [];

        if ($timeEntry) {
            $output->writeln('Current project is: <info>' . $timeEntry->getFormattedNameWithCustomer() . '</info>');

            $question = new ConfirmationQuestion(
                'Would you like to change the project? [default is "n"] ',
                false,
                '/^(y|j)/i'
            );
            if ($helper->ask($input, $output, $question)) {
                // Ask for the project.
                $options['project_id'] = $this->commandHelper->askForProject($input, $output, $helper);
            }

            $output->writeln('Current service is: <info>' . $timeEntry->getServiceName() . '</info>');

            $question = new ConfirmationQuestion(
                'Would you like to change the service? [default is "n"] ',
                false,
                '/^(y|j)/i'
            );
            if ($helper->ask($input, $output, $question)) {
                // Ask for the service.
                $options['service_id'] = $this->commandHelper->askForService($input, $output, $helper);
            }

            $output->writeln('Current minutes tracked: <info>' . $timeEntry->getMinutes() . '</info>');

            $question = new ConfirmationQuestion(
                'Would you like to change the tracked minutes? [default is "n"] ',
                false,
                '/^(y|j)/i'
            );
            if ($helper->ask($input, $output, $question)) {
                $question = new Question('Set minutes tracked to ');
                $options['minutes'] = $helper->ask($input, $output, $question);
            }

            $output->writeln('Current note: <info>' . $timeEntry->getNote() . '</info>');

            $question = new ConfirmationQuestion(
                'Would you like to change the note? [default is "n"] ',
                false,
                '/^(y|j)/i'
            );
            if ($helper->ask($input, $output, $question)) {
                $question = new Question('Set note to ');
                $options['note'] = $helper->ask($input, $output, $question);
            }
        }

        return $options;
    }

    /**
     * @param $id
     *
     * @return TimeEntry
     */
    private function getTimeEntry($id)
    {
        $timeEntry = null;

        $response = $this->commandHelper->getClient()->readTimeEntry($id);
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody()->getContents(), true);
            if (isset($data['time_entry'])) {
                $timeEntryBuilder = $this->commandHelper
                    ->getResourceBuilderFactory()
                    ->createTimeEntryResourceBuilder();

                $timeEntry = $this->commandHelper->getDirector()
                    ->build($timeEntryBuilder, $data['time_entry']);
            }
        }

        return $timeEntry;
    }
}
