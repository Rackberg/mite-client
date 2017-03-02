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

use lrackwitz\mite\Entities\Resource\BuilderInterface;
use lrackwitz\mite\Entities\Resource\TimeEntry;
use lrackwitz\mite\Entities\Resource\TimeEntryInterface;

/**
 * Class TimeEntryResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class TimeEntryResourceBuilder implements BuilderInterface, TimeEntryInterface
{
    /**
     * The time entry resource.
     *
     * @var TimeEntryInterface
     */
    private $timeEntry;

    /**
     * Creates a new time entry instance.
     */
    public function create()
    {
        $this->timeEntry = new TimeEntry();
    }

    /**
     * Returns the built time entry instance.
     *
     * @return TimeEntryInterface
     */
    public function getResult()
    {
        return $this->timeEntry;
    }

    /**
     * Sets the id.
     *
     * @param string $id
     */
    public function setId($id = null)
    {
        $this->timeEntry->setId($id);
    }

    /**
     * Sets the minutes.
     *
     * @param int $minutes
     */
    public function setMinutes($minutes = null)
    {
        $this->timeEntry->setMinutes($minutes);
    }

    /**
     * Sets the at date (format YYYY-MM-DD).
     *
     * @param string $dateAt
     */
    public function setDateAt($dateAt = null)
    {
        $this->timeEntry->setDateAt($dateAt);
    }

    /**
     * Sets the note.
     *
     * @param string $note
     */
    public function setNote($note = null)
    {
        $this->timeEntry->setNote($note);
    }

    /**
     * Sets the billable flag.
     *
     * @param bool $billable
     */
    public function setBillable(bool $billable = false)
    {
        $this->timeEntry->setBillable($billable);
    }

    /**
     * Sets the locked flag.
     *
     * @param bool $locked
     */
    public function setLocked(bool $locked = false)
    {
        $this->timeEntry->setLocked($locked);
    }

    /**
     * Sets the revenue.
     *
     * @param string $revenue
     */
    public function setRevenue($revenue = null)
    {
        $this->timeEntry->setRevenue($revenue);
    }

    /**
     * Sets the hourly rate.
     *
     * @param int $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null)
    {
        $this->setHourlyRate($hourlyRate);
    }

    /**
     * Sets the user id.
     *
     * @param int $userId
     */
    public function setUserId($userId = null)
    {
        $this->setUserId($userId);
    }

    /**
     * Sets the user name.
     *
     * @param string $userName
     */
    public function setUserName($userName = null)
    {
        $this->setUserName($userName);
    }

    /**
     * Sets the project id.
     *
     * @param int $projectId
     */
    public function setProjectId($projectId = null)
    {
        $this->setUserName($projectId);
    }

    /**
     * Sets the project name.
     *
     * @param string $projectName
     */
    public function setProjectName($projectName = null)
    {
        $this->setProjectName($projectName);
    }

    /**
     * Sets the customer id.
     *
     * @param int $customerId
     */
    public function setCustomerId($customerId = null)
    {
        $this->setCustomerId($customerId);
    }

    /**
     * Sets the customer name.
     *
     * @param string $customerName
     */
    public function setCustomerName($customerName = null)
    {
        $this->setCustomerName($customerName);
    }

    /**
     * Sets the service id.
     *
     * @param int $serviceId
     */
    public function setServiceId($serviceId = null)
    {
        $this->setServiceId($serviceId);
    }

    /**
     * Sets the service name.
     *
     * @param string $serviceName
     */
    public function setServiceName($serviceName = null)
    {
        $this->setServiceName($serviceName);
    }

    /**
     * Sets the date and time of creation.
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->timeEntry->setCreatedAt($createdAt);
    }

    /**
     * Sets the date and time of last update.
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->setUpdatedAt($updatedAt);
    }
}
