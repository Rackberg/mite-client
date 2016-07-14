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
 * Contains lrackwitz\mite\Service\Builder\TimeEntryResourceBuilder.php.
 */
namespace lrackwitz\mite\Service\Builder;

use lrackwitz\mite\Entities\Resource\AbstractResourceBuilder;
use lrackwitz\mite\Entities\Resource\TimeEntry;

/**
 * Class TimeEntryResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class TimeEntryResourceBuilder extends AbstractResourceBuilder
{
    /**
     * The time entry resource.
     *
     * @var TimeEntry
     */
    private $timeEntry;

    public function __construct()
    {
        $this->timeEntry = new TimeEntry();
    }

    public function setId($id = null)
    {
        $this->timeEntry->setId($id);
    }

    public function setMinutes($minutes = null)
    {
        $this->timeEntry->setMinutes($minutes);
    }

    public function setBillable(bool $billable)
    {
        $this->timeEntry->setBillable($billable);
    }

    public function setCustomerId($customerId = null)
    {
        $this->timeEntry->setCustomerId($customerId);
    }

    public function setCustomerName($customerName = null)
    {
        $this->timeEntry->setCustomerName($customerName);
    }

    public function setDateAt($dateAt = null)
    {
        $this->timeEntry->setDateAt($dateAt);
    }

    public function setHourlyRate($hourlyRate = null)
    {
        $this->timeEntry->setHourlyRate($hourlyRate);
    }

    public function setLocked(bool $locked)
    {
        $this->timeEntry->setLocked($locked);
    }

    public function setNote($note = null)
    {
        $this->timeEntry->setNote($note);
    }

    public function setProjectId($projectId = null)
    {
        $this->timeEntry->setProjectId($projectId);
    }

    public function setProjectName($projectName = null)
    {
        $this->timeEntry->setProjectName($projectName);
    }

    public function setRevenue($revenue = null)
    {
        $this->timeEntry->setRevenue($revenue);
    }

    public function setServiceId($serviceId = null)
    {
        $this->timeEntry->setServiceId($serviceId);
    }

    public function setUserId($userId = null)
    {
        $this->timeEntry->setUserId($userId);
    }

    public function setUserName($userName = null)
    {
        $this->timeEntry->setUserName($userName);
    }

    public function setServiceName($serviceName = null)
    {
        $this->timeEntry->setServiceName($serviceName);
    }

    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->timeEntry->setCreatedAt($createdAt);
    }

    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->timeEntry->setUpdatedAt($updatedAt);
    }
    
    public function getResult()
    {
        $timeEntry = $this->timeEntry;
        $this->timeEntry = new TimeEntry();

        return $timeEntry;
    }
}
