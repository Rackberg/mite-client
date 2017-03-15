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
 * Contains lrackwitz\mite\Command\ReadTimeEntriesCommand.php.
 */
namespace lrackwitz\mite\Command;

use GuzzleHttp\Psr7\Response;
use lrackwitz\mite\Entities\Resource\TimeEntry;
use lrackwitz\mite\Entities\Resource\TrackingTimeEntry;
use lrackwitz\mite\Entities\TimeEntryGroup;
use lrackwitz\mite\Service\AccountResourceBuilder;
use lrackwitz\mite\Service\CommandHelper;
use lrackwitz\mite\Service\RequestFactory;
use lrackwitz\mite\Service\TimeEntryGroupBuilder;
use lrackwitz\mite\Service\TimeEntryResourceBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Helper\TableStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ReadTimeEntriesCommand.
 *
 * @package lrackwitz\mite\Command
 */
class ReadTimeEntriesCommand extends Command
{
    /**
     * The command helper.
     *
     * @var CommandHelper
     */
    private $commandHelper;

    /**
     * The request factory.
     *
     * @var RequestFactory
     */
    private $factory;

    public function __construct(
        CommandHelper $commandHelper,
        RequestFactory $factory
    ) {
        $this->commandHelper = $commandHelper;
        $this->factory = $factory;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('time_entry:list')
            ->setDescription('Returns a list of time entries.')
            ->setAliases(['times'])
            ->addOption(
                'customer_id',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Filter time entries by one or more customers.'
            )
            ->addOption(
                'project_id',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Filter time entries by one or more projects.'
            )
            ->addOption(
                'service_id',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Filter time entries by one or more services.'
            )
            ->addOption(
                'note',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Filter time entries by on or more notes.'
            )
            ->addOption(
                'at',
                null,
                InputOption::VALUE_OPTIONAL,
                'Filter time entries by date. Can be "today", "yesterday", "this_week", "last_week", "this_month", "last_month", "this_year", "last_year", or real date of format "YYYY-MM-DD".',
                'today'
            )
            ->addOption(
                'from',
                null,
                InputOption::VALUE_OPTIONAL,
                'Filter time entries logged at date. Can be "today", "yesterday", "this_week", "last_week", "this_month", "last_month", "this_year", "last_year", or real date of format "YYYY-MM-DD".'
            )
            ->addOption(
                'to',
                null,
                InputOption::VALUE_OPTIONAL,
                'Filter time entries logged until date. Can be "today", "yesterday", "this_week", "last_week", "this_month", "last_month", "this_year", "last_year", or real date of format "YYYY-MM-DD".'
            )
            ->addOption(
                'billable',
                null,
                InputOption::VALUE_OPTIONAL,
                'Filter billable or unbillable time entries. Can be "1" for billable or "0" for unbillable.'
            )
            ->addOption(
                'locked',
                null,
                InputOption::VALUE_OPTIONAL,
                'Filter locked or unlocked time entries. Can be "1" for locked or "0" for unlocked.'
            )
            ->addOption(
                'tracking',
                null,
                InputOption::VALUE_OPTIONAL,
                'Filter time entries by tracking state. Can be "1" for currently tracking or "0" for time entries that are not tracked currently.'
            )
            ->addOption(
                'sort',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sort time entries. Can be "date", "user", "customer", "project", "service", "note", "minutes", or "revenue".',
                'date'
            )
            ->addOption(
                'direction',
                null,
                InputOption::VALUE_OPTIONAL,
                'Change the sort direction. Can be "asc" or "desc". The default value is "asc" but if you sort by "date", "minutes" or "revenue" the default value is "desc".',
                'asc'
            )
            ->addOption(
                'group_by',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Groups the time entries. Can be "user", "customer", "project", "service", "day", "week", "month" and "year".'
            )
            ->addOption(
                'limit',
                null,
                InputOption::VALUE_OPTIONAL,
                'Limit the filtered results. Default is unlimited.'
            )
            ->addOption(
                'page',
                null,
                InputOption::VALUE_OPTIONAL,
                'The page number in combination with limit.'
            )
            ->addOption(
                'show-service-only',
                null,
                InputOption::VALUE_OPTIONAL,
                'Shows only the service name of current tracking entry.'
            )
            ->addOption(
                'show-project-only',
                null,
                InputOption::VALUE_OPTIONAL,
                'Shows only the project name of current tracking entry.'
            )
            ->addOption(
                'show-id-only',
                null,
                InputOption::VALUE_OPTIONAL,
                'Shows only the id of the current tracking entry.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $options = array_filter(
            $input->getOptions(),
            function ($value) {
                if ($value == null) {
                    return false;
                }

                return true;
            }
        );

        array_walk(
            $options,
            function (&$value, $key) {
                if (is_array($value) && !empty($value)) {
                    $value = join(',', $value);
                }

                $value = sprintf('%s=%s', $key, $value);
            }
        );

        $response = $this->commandHelper->getClient()->readTimeEntries(
            $options
        );

        $trackingTimeEntry = $this->getTrackingTimeEntry();

        $this->outputResponse($response, $input, $output, $trackingTimeEntry);
    }

    private function outputResponse(
        Response $response,
        InputInterface $input,
        OutputInterface $output,
        TrackingTimeEntry $trackingTimeEntry = null
    ) {
        // If the results should be reported as groups
        // we need to use another builder.
        if ($input->getOption('group_by')) {
            $this->outputAsGroups($response, $output, $trackingTimeEntry);
        } elseif ($input->getOption('show-service-only')) {
            $this->showServiceOnly($response, $output, $trackingTimeEntry);
        } elseif ($input->getOption('show-project-only')) {
            $this->showProjectOnly($response, $output, $trackingTimeEntry);
        } elseif ($input->getOption('show-id-only')) {
            $this->showIdOnly($response, $output, $trackingTimeEntry);
        } else {
            $this->outputDefault($response, $output, $trackingTimeEntry);
        }
    }

    private function getTrackingTimeEntry()
    {
        $timeEntry = null;

        $builder = $this->commandHelper
            ->getResourceBuilderFactory()
            ->createTrackingTimeEntryResourceBuilder();

        $response = $this->commandHelper->getClient()->readTracker();
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['tracker']['tracking_time_entry'])) {
                $timeEntry = $this->commandHelper->getDirector()
                    ->build($builder, $data['tracker']['tracking_time_entry']);
            }
        }

        return $timeEntry;
    }

    private function outputAsGroups(
        Response $response,
        OutputInterface $output,
        TrackingTimeEntry $trackingTimeEntry = null
    ) {
        $groups = json_decode($response->getBody()->getContents(), true);

        $timeEntryGroupBuilder = $this->commandHelper
            ->getResourceBuilderFactory()->createTimeEntryGroupResourceBuilder(
            );

        foreach ($groups as &$group) {
            /** @var TimeEntryGroup $group */
            $group = $this->commandHelper->getDirector()->build(
                $timeEntryGroupBuilder,
                $group['time_entry_group']
            );
            $output->writeln($group->__toString());
        }
    }

    private function outputDefault(
        Response $response,
        OutputInterface $output,
        TrackingTimeEntry $trackingTimeEntry = null
    ) {
        $items = json_decode($response->getBody()->getContents(), true);

        $table = new Table($output);
        $table->setHeaders(
            [
                'ID',
                'Project / Comment',
                'Customer',
                'Service',
                'Time Tracked',
                'Tracking',
            ]
        );

        $formatter = $this->getHelper('formatter');

        $num_items = count($items);

        $timeEntryBuilder = $this->commandHelper
            ->getResourceBuilderFactory()->createTimeEntryResourceBuilder();

        $sum_minutes = 0;
        foreach ($items as $key => &$item) {
            $isTracking = false;

            /** @var TimeEntry $item */
            $item = $this->commandHelper->getDirector()->build(
                $timeEntryBuilder,
                $item['time_entry']
            );

            if ($trackingTimeEntry && $item->getId() == $trackingTimeEntry->getId()) {
                $isTracking = true;
            }

            $table->addRow(
                [
                    $item->getId(),
                    'Project: ' . $item->getProjectName(),
                    $item->getCustomerName(),
                    $item->getServiceName(),
                    $isTracking
                        ? '<fg=cyan>'.$this->commandHelper->convertMinutesToTime($trackingTimeEntry->getMinutes()).'+</>'
                        : $this->commandHelper->convertMinutesToTime($item->getMinutes()),
                    $isTracking ? '<fg=cyan>Running</>' : '-',
                ]
            );
            $table->addRow(
                [
                    '',
                    new TableCell(
                        'Comment: '.$formatter->truncate($item->getNote(), 50),
                        ['colspan' => 4]
                    ),
                ]
            );

            if ($num_items - 1 > $key) {
                $table->addRow(new TableSeparator());
            }

            // Calculate the minutes.
            if ($isTracking) {
                $sum_minutes += $trackingTimeEntry->getMinutes();
            } else {
                $sum_minutes += $item->getMinutes();
            }
        }
        $rightAligned = new TableStyle();
        $rightAligned->setPadType(STR_PAD_LEFT);
        $table->addRow(new TableSeparator());
        $table->addRow(
            [
                new TableCell(
                    '<fg=white>Sum of tracked time shown:</> ',
                    ['colspan' => 4]
                ),
                new TableCell(
                    '<fg=white>'.$this->commandHelper->convertMinutesToTime($sum_minutes).'</>',
                    ['colspan' => 2]
                ),
            ]
        );

        $table->render();
    }

    private function showServiceOnly(
        Response $response,
        OutputInterface $output,
        TrackingTimeEntry $trackingTimeEntry = null
    ) {
        $items = json_decode($response->getBody()->getContents(), true);

        $timeEntryBuilder = $this->commandHelper
            ->getResourceBuilderFactory()->createTimeEntryResourceBuilder();

        foreach ($items as $key => &$item) {
            $isTracking = false;

            /** @var TimeEntry $item */
            $item = $this->commandHelper->getDirector()->build(
                $timeEntryBuilder,
                $item['time_entry']
            );

            if ($trackingTimeEntry && $item->getId() == $trackingTimeEntry->getId()) {
                if (!empty($item->getServiceName())) {
                    $output->writeln($item->getServiceName());
                }
                break;
            }
        }
    }

    private function showProjectOnly(
        Response $response,
        OutputInterface $output,
        TrackingTimeEntry $trackingTimeEntry = null
    ) {
        $items = json_decode($response->getBody()->getContents(), true);

        $timeEntryBuilder = $this->commandHelper
            ->getResourceBuilderFactory()->createTimeEntryResourceBuilder();

        foreach ($items as $key => &$item) {
            $isTracking = false;

            /** @var TimeEntry $item */
            $item = $this->commandHelper->getDirector()->build(
                $timeEntryBuilder,
                $item['time_entry']
            );

            if ($trackingTimeEntry && $item->getId() == $trackingTimeEntry->getId()) {
                $formatted_name = $item->getFormattedNameWithCustomer();
                if (!empty($formatted_name)) {
                    $output->writeln($formatted_name);
                }
                break;
            }
        }
    }

    private function showIdOnly(
        Response $response,
        OutputInterface $output,
        TrackingTimeEntry $trackingTimeEntry = null
    ) {
        $items = json_decode($response->getBody()->getContents(), true);

        $timeEntryBuilder = $this->commandHelper
            ->getResourceBuilderFactory()->createTimeEntryResourceBuilder();

        foreach ($items as $key => &$item) {
            $isTracking = false;

            /** @var TimeEntry $item */
            $item = $this->commandHelper->getDirector()->build(
                $timeEntryBuilder,
                $item['time_entry']
            );

            if ($trackingTimeEntry && $item->getId() == $trackingTimeEntry->getId()) {
                if (!empty($item->getId())) {
                    $output->writeln($item->getId());
                }
                break;
            }
        }
    }
}
