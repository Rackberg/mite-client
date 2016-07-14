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
 * Contains lrackwitz\mite\Command\StopTrackingCommand.php.
 */
namespace lrackwitz\mite\Command;

use GuzzleHttp\Exception\ClientException;
use lrackwitz\mite\Entities\Resource\StoppedTimeEntryInterface;
use lrackwitz\mite\Service\CommandHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

/**
 * Class StopTrackingCommand.
 *
 * @package lrackwitz\mite\Command
 */
class StopTrackingCommand extends Command
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
            ->setName('tracker:stop')
            ->setDescription('Stops the tracking of a time entry.')
            ->setAliases(['stop'])
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'The id of the tracking time entry.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $response = null;
        try {
            $response = $this->commandHelper->getClient()->stopTracking($id);

            if ($response && $response->getStatusCode() == 200) {
                $stoppedTimEntry = $this->getStoppedTimeEntry($response->getBody()->getContents());

                $message = sprintf(
                    'Stopped tracking of time entry (ID <info>%s</info>) after <info>%s minutes</info>.',
                    $stoppedTimEntry->getId(),
                    $stoppedTimEntry->getMinutes()
                );
                $output->writeln($message);
            }
        } catch (ClientException $e) {
            if ($e->getCode() == 404) {
                $output->writeln(
                    sprintf(
                        'Time entry (<fg=red>ID %s</>) not found! <fg=red>Skipping.</>',
                        $id
                    )
                );
            }
        }

        // Ask the user if he want's to edit some
        // information of the stopped entry.
        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion(
            'Would you like to edit information of the stopped time entry? [n] ',
            false,
            '/^(y|j)/i'
        );
        if ($helper->ask($input, $output, $question)) {
            // Call the edit command.
            $command = $this->getApplication()->find('time_entry:edit');
            $editInput = new ArrayInput([
                'command' => 'time_entry:edit',
                'id' => $id,
            ]);

            $command->run($editInput, $output);
        }
    }

    /**
     * @param $json
     *
     * @return StoppedTimeEntryInterface
     */
    private function getStoppedTimeEntry($json)
    {
        $stoppedTimeEntry = null;

        $data = json_decode($json, true);
        if (isset($data['tracker']['stopped_time_entry'])) {
            $resourceBuilder = $this->commandHelper->getResourceBuilderFactory()
                ->createStoppedTimeEntryResourceBuilder();

            $stoppedTimeEntry = $this->commandHelper->getDirector()
                ->build($resourceBuilder, $data['tracker']['stopped_time_entry']);
        }

        return $stoppedTimeEntry;
    }
}
