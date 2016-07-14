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

use lrackwitz\mite\Entities\Resource\AbstractResourceBuilder;
use lrackwitz\mite\Entities\TimeEntryGroup;

/**
 * Class TimeEntryGroupBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class TimeEntryGroupBuilder extends AbstractResourceBuilder
{
    /**
     * The time entry group.
     *
     * @var TimeEntryGroup
     */
    private $timeEntryGroup;

    public function __construct()
    {
        $this->timeEntryGroup = new TimeEntryGroup();
    }

    public function setMinutes($minutes = null)
    {
        $this->timeEntryGroup->setMinutes($minutes);
    }

    public function setProjectId($projectId = null)
    {
        $this->timeEntryGroup->setProjectId($projectId);
    }

    public function setProjectName($projectName = null)
    {
        $this->timeEntryGroup->setProjectName($projectName);
    }

    public function setRevenue($revenue = null)
    {
        $this->timeEntryGroup->setRevenue($revenue);
    }

    public function setMonth($month = null)
    {
        $this->timeEntryGroup->setMonth($month);
    }

    public function setParams(array $params = array())
    {
        $this->timeEntryGroup->setParams($params);
    }

    public function getResult()
    {
        return $this->timeEntryGroup;
    }
}
