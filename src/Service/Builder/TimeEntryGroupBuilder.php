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
 * Contains lrackwitz\mite\Service\Builder\TimeEntryGroupBuilder.php.
 */
namespace lrackwitz\mite\Service\Builder;

use lrackwitz\mite\Entities\Resource\BuilderInterface;
use lrackwitz\mite\Entities\Resource\TimeEntryGroupInterface;
use lrackwitz\mite\Entities\TimeEntryGroup;

/**
 * Class TimeEntryGroupBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class TimeEntryGroupBuilder implements BuilderInterface, TimeEntryGroupInterface
{
    /**
     * The time entry group.
     *
     * @var TimeEntryGroup
     */
    private $timeEntryGroup;

    /**
     * Creates a new time entry group instance.
     */
    public function create()
    {
        $this->timeEntryGroup = new TimeEntryGroup();
    }

    /**
     * Returns the built time entry group instance.
     *
     * @return TimeEntryGroupInterface
     */
    public function getResult()
    {
        return $this->timeEntryGroup;
    }

    /**
     * Sets the minutes.
     *
     * @param int $minutes
     */
    public function setMinutes($minutes = null)
    {
        $this->timeEntryGroup->setMinutes($minutes);
    }

    /**
     * Sets the revenue.
     *
     * @param string $revenue
     */
    public function setRevenue($revenue = null)
    {
        $this->timeEntryGroup->setRevenue($revenue);
    }

    /**
     * Sets the project id.
     *
     * @param int $projectId
     */
    public function setProjectId($projectId = null)
    {
        $this->timeEntryGroup->setProjectId($projectId);
    }

    /**
     * Sets the project name.
     *
     * @param string $projectName
     */
    public function setProjectName($projectName = null)
    {
        $this->timeEntryGroup->setProjectName($projectName);
    }

    /**
     * Sets the month.
     *
     * @param string $month
     */
    public function setMonth($month = null)
    {
        $this->timeEntryGroup->setMonth($month);
    }

    /**
     * Sets the parameters.
     *
     * @param array $params
     */
    public function setParams(array $params = array())
    {
        $this->timeEntryGroup->setParams($params);
    }
}
