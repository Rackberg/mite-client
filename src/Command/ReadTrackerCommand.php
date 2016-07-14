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
 * Contains lrackwitz\mite\Command\ReadTrackerCommand.php.
 */
namespace lrackwitz\mite\Command;

use GuzzleHttp\Psr7\Request;
use lrackwitz\mite\Entities\Resource\ResourceBuilderInterface;
use lrackwitz\mite\Entities\Resource\TrackingTimeEntry;
use lrackwitz\mite\Service\Builder\TrackingTimeEntryResourceBuilder;
use lrackwitz\mite\Service\CommandHelper;
use lrackwitz\mite\Service\MiteClient;
use lrackwitz\mite\Service\ResourceDirector;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ReadTrackerCommand.
 *
 * @package lrackwitz\mite\Command
 */
class ReadTrackerCommand extends Command
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
            ->setName('tracker:read')
            ->setDescription('Shows the current tracker status.')
            ->setAliases(['status'])
            ->addOption(
                'time',
                null,
                InputOption::VALUE_OPTIONAL,
                'Returns only the time of the tracker.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->commandHelper->getClient()->readTracker();

        $data = json_decode($response->getBody()->getContents(), true);

        if (!empty($data['tracker']) &&
            isset($data['tracker']['tracking_time_entry'])
        ) {
            $builder = $this->commandHelper->getResourceBuilderFactory()
                ->createTrackingTimeEntryResourceBuilder();

            /** @var TrackingTimeEntry $trackingTimeEntry */
            $trackingTimeEntry = $this->commandHelper->getDirector()->build(
                $builder,
                $data['tracker']['tracking_time_entry']
            );

            if ($input->getOption('time')) {
                $output->writeln(
                    $this->commandHelper
                        ->convertMinutesToTime($trackingTimeEntry->getMinutes())
                );
            } else {
                $output->writeln($trackingTimeEntry->__toString());
            }
        } else {
            if ($input->getOption('time')) {
                // Output nothing
                return;
            }

            $output->writeln('It seems that there is currently <info>no tracking</info> active.');
        }
    }
}
