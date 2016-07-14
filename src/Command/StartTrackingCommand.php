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
 * Contains lrackwitz\mite\Command\StartTrackingCommand.php.
 */
namespace lrackwitz\mite\Command;

use lrackwitz\mite\Entities\Resource\TimeEntry;
use lrackwitz\mite\Service\CommandHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class StartTrackingCommand.
 *
 * @package lrackwitz\mite\Command
 */
class StartTrackingCommand extends Command
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
            ->setName('tracker:start')
            ->setDescription('Starts the tracking of a time entry.')
            ->setAliases(['start', 'track'])
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'The id of the time entry.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $response = $this->commandHelper->getClient()->startTracking(new TimeEntry($id));

        if ($response->getStatusCode() == 200) {
            $message = sprintf(
                'Started tracking of time entry (<info>ID %s</info>).',
                $id
            );
            $output->writeln($message);
        }
    }
}
