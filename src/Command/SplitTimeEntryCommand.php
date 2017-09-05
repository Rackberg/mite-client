<?php
/**
 * @file
 * Contains lrackwitz\mite\Command\SplitTimeEntryCommand.php.
 */

namespace lrackwitz\mite\Command;

use lrackwitz\mite\Service\CommandHelper;
use lrackwitz\mite\Service\Manager\TimeEntryManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SplitTimeEntryCommand.
 *
 * @package lrackwitz\mite\Command
 */
class SplitTimeEntryCommand extends Command {

    /**
     * The command helper.
     *
     * @var CommandHelper
     */
    private $commandHelper;

    /**
     * The time entry manager.
     *
     * @var \lrackwitz\mite\Service\Manager\TimeEntryManager
     */
    private $manager;

    /**
     * The command to create a new time entry.
     *
     * @var \lrackwitz\mite\Command\CreateTimeEntryCommand
     */
    private $createTimeEntryCommand;

    public function __construct(
        CommandHelper $commandHelper,
        TimeEntryManager $manager,
        CreateTimeEntryCommand $command
    ) {
        $this->commandHelper = $commandHelper;
        $this->manager = $manager;
        $this->createTimeEntryCommand = $command;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure() {
        $this
            ->setName('time_entry:split')
            ->setDescription('Splits a time entry into new time entries.')
            ->setAliases(['split'])
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'The id of the time entry to split.'
            )
            ->addArgument(
                'number_new_entries',
                InputArgument::REQUIRED,
                'The number of new time entries to create.'
            )
        ;
    }

    /**
    * {@inheritdoc}
    */
    protected function execute(InputInterface $input, OutputInterface $output) {

        $id = $input->getArgument('id');
        $num_new_entries = $input->getArgument('number_new_entries');

        $timeEntry = $this->manager->getTimeEntry($id);

        // Calculate the new minutes.
        $new_minutes = $timeEntry->getMinutes() > 1
            ? $timeEntry->getMinutes() / $num_new_entries
            : 0;

        $createCommand = $this->getApplication()->find('time_entry:create');

        for ($i = 0; $i < $num_new_entries; $i++) {
            $output->writeln("\n" . 'Creating the ' . ($i + 1) . '. new time entry:');
            $createCommand->run(new ArrayInput([
                '--project_id' => $timeEntry->getProjectId(),
                '--service_id' => $timeEntry->getServiceId(),
                '--minutes' => $new_minutes,
            ]), $output);
        }

        // Delete the splitted time entry.
        $deleteCommand = $this->getApplication()->find('time_entry:delete');
        $deleteCommand->run(new ArrayInput([
            'id' => $timeEntry->getId(),
        ]), $output);

        $output->writeln('<info>Finished time entry split.</info>');
    }


}
