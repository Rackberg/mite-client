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
 * Contains lrackwitz\mite\Entities\Resource\TimeEntry.php.
 */
namespace lrackwitz\mite\Entities\Resource;

use lrackwitz\mite\Entities\Loggable;

/**
 * Class TimeEntry.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
class TimeEntry extends Loggable implements ResourceInterface
{
    /**
     * The time entry id.
     *
     * @var string
     */
    private $id;

    /**
     * The amount of minutes.
     *
     * @var int
     */
    private $minutes;

    /**
     * The date.
     *
     * @var string
     */
    private $dateAt;

    /**
     * A note.
     *
     * @var string
     */
    private $note;

    /**
     * A flag indicating if the time entry is billable.
     *
     * @var boolean
     */
    private $billable;

    /**
     * A flag indicating if the time entry is locked.
     *
     * @var boolean
     */
    private $locked;

    /**
     * The revenue.
     *
     * @var string
     */
    private $revenue;

    /**
     * The hourly rate.
     *
     * @var int
     */
    private $hourlyRate;

    /**
     * The user id.
     *
     * @var int
     */
    private $userId;

    /**
     * The user name.
     * @var string
     */
    private $userName;

    /**
     * The project id.
     *
     * @var int
     */
    private $projectId;

    /**
     * The project name.
     *
     * @var string
     */
    private $projectName;

    /**
     * The customer id.
     *
     * @var int
     */
    private $customerId;

    /**
     * The customer name.
     *
     * @var string
     */
    private $customerName;

    /**
     * The service id.
     *
     * @var int
     */
    private $serviceId;

    /**
     * The service name.
     *
     * @var string
     */
    private $serviceName;

    /**
     * The date and time of creation.
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * The date and time of last modification.
     *
     * @var \DateTime
     */
    private $updatedAt;

    public function __construct(
        $id = null,
        $minutes = null,
        $dateAt = null,
        $note = null,
        $billable = null,
        $locked = null,
        $revenue = null,
        $hourlyRate = null,
        $userId = null,
        $userName = null,
        $projectId = null,
        $projectName = null,
        $customerId = null,
        $customerName = null,
        $serviceId = null,
        $serviceName = null,
        \DateTime $createdAt = null,
        \DateTime $updatedAt = null
    ) {
        if ($id) {
            $this->id = $id;
        }
        if ($minutes) {
            $this->minutes = $minutes;
        }
        if ($dateAt) {
            $this->dateAt = $dateAt;
        }
        if ($note) {
            $this->note = $note;
        }
        if ($billable != null) {
            $this->billable = $billable;
        }
        if ($locked != null) {
            $this->locked = $locked;
        }
        if ($revenue) {
            $this->revenue = $revenue;
        }
        if ($hourlyRate) {
            $this->hourlyRate = $hourlyRate;
        }
        if ($userId) {
            $this->userId = $userId;
        }
        if ($userName) {
            $this->userName = $userName;
        }
        if ($projectId) {
            $this->projectId = $projectId;
        }
        if ($projectName) {
            $this->projectName = $projectName;
        }
        if ($customerId) {
            $this->customerId = $customerId;
        }
        if ($customerName) {
            $this->customerName = $customerName;
        }
        if ($serviceId) {
            $this->serviceId = $serviceId;
        }
        if ($serviceName) {
            $this->serviceName = $serviceName;
        }
        if ($createdAt) {
            $this->createdAt = $createdAt;
        }
        if ($updatedAt) {
            $this->updatedAt = $updatedAt;
        }
    }

    public function __toString()
    {
        $attributes = get_class_vars(get_class($this));
        array_walk($attributes, function (&$value, $key) {
            $value = $this->{$key};
        });
        return parent::toString(__CLASS__, $attributes);
    }

    /**
     * Returns id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns minutes.
     *
     * @return int
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param int $minutes
     */
    public function setMinutes($minutes = null)
    {
        $this->minutes = $minutes;
    }

    /**
     * Returns dateAt.
     *
     * @return string
     */
    public function getDateAt()
    {
        return $this->dateAt;
    }

    /**
     * @param string $dateAt
     */
    public function setDateAt($dateAt = null)
    {
        $this->dateAt = $dateAt;
    }

    /**
     * Returns note.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note = null)
    {
        $this->note = $note;
    }

    /**
     * Returns billable.
     *
     * @return boolean
     */
    public function isBillable()
    {
        return $this->billable;
    }

    /**
     * @param boolean $billable
     */
    public function setBillable(bool $billable)
    {
        $this->billable = $billable;
    }

    /**
     * Returns locked.
     *
     * @return boolean
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @param boolean $locked
     */
    public function setLocked(bool $locked)
    {
        $this->locked = $locked;
    }

    /**
     * Returns revenue.
     *
     * @return string
     */
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * @param string $revenue
     */
    public function setRevenue($revenue = null)
    {
        $this->revenue = $revenue;
    }

    /**
     * Returns hourlyRate.
     *
     * @return int
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    /**
     * @param int $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null)
    {
        $this->hourlyRate = $hourlyRate;
    }

    /**
     * Returns userId.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId = null)
    {
        $this->userId = $userId;
    }

    /**
     * Returns userName.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName = null)
    {
        $this->userName = $userName;
    }

    /**
     * Returns projectId.
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    public function setProjectId($projectId = null)
    {
        $this->projectId = $projectId;
    }

    /**
     * Returns projectName.
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * @param string $projectName
     */
    public function setProjectName($projectName = null)
    {
        $this->projectName = $projectName;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId($customerId = null) {
        $this->customerId = $customerId;
    }

    /**
     * Returns customerId.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Returns customerName.
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     */
    public function setCustomerName($customerName = null)
    {
        $this->customerName = $customerName;
    }

    /**
     * Returns serviceId.
     *
     * @return int
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * @param int $serviceId
     */
    public function setServiceId($serviceId = null)
    {
        $this->serviceId = $serviceId;
    }

    /**
     * Returns serviceName.
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @param string $serviceName
     */
    public function setServiceName($serviceName = null)
    {
        $this->serviceName = $serviceName;
    }

    /**
     * Returns createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }
}
