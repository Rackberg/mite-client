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
 * Contains lrackwitz\mite\Entities\Resource\Project.php.
 */
namespace lrackwitz\mite\Entities\Resource;

use lrackwitz\mite\Entities\Loggable;

/**
 * Class Project.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
class Project extends Loggable implements ResourceInterface
{
    /**
     * The project id.
     *
     * @var int
     */
    private $id;

    /**
     * The name.
     *
     * @var string
     */
    private $name;

    /**
     * A note.
     *
     * @var string
     */
    private $note;

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
     * The budget in minutes or cents.
     *
     * @var int
     */
    private $budget;

    /**
     * The budget type.
     *
     * @var string
     */
    private $budgetType;

    /**
     * The hourly rate.
     *
     * @var string
     */
    private $hourlyRate;

    /**
     * The active hourly rate.
     *
     * @var string
     */
    private $activeHourlyRate;

    /**
     * An array with hourly rates per service.
     *
     * @var []
     */
    private $hourlyRatesPerService;

    /**
     * A flag indication if the project is archived.
     *
     * @var boolean
     */
    private $archived;

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
        $name = null,
        $note = null,
        $customerId = null,
        $customerName = null,
        $budget = null,
        $budgetType = null,
        $hourlyRate = null,
        $activeHourlyRate = null,
        $hourlyRatesPerService = null,
        $archived = null,
        $createdAt = null,
        $updatedAt = null
    ) {
        if ($id) {
            $this->id = $id;
        }
        if ($name) {
            $this->name = $name;
        }
        if ($note) {
            $this->note = $note;
        }
        if ($customerId) {
            $this->customerId = $customerId;
        }
        if ($customerName) {
            $this->customerName = $customerName;
        }
        if ($budget) {
            $this->budget = $budget;
        }
        if ($budgetType) {
            $this->budgetType = $budgetType;
        }
        if ($hourlyRate) {
            $this->hourlyRate = $hourlyRate;
        }
        if ($activeHourlyRate) {
            $this->activeHourlyRate = $activeHourlyRate;
        }
        if ($hourlyRatesPerService) {
            $this->hourlyRatesPerService = $hourlyRatesPerService;
        }
        if ($archived != null) {
            $this->archived = $archived;
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name = null)
    {
        $this->name = $name;
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
     * Returns customerId.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
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
     * Returns budget.
     *
     * @return int
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param int $budget
     */
    public function setBudget($budget = null)
    {
        $this->budget = $budget;
    }

    /**
     * Returns budgetType.
     *
     * @return string
     */
    public function getBudgetType()
    {
        return $this->budgetType;
    }

    /**
     * @param string $budgetType
     */
    public function setBudgetType($budgetType = null)
    {
        $this->budgetType = $budgetType;
    }

    /**
     * Returns hourlyRate.
     *
     * @return string
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    /**
     * @param string $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null)
    {
        $this->hourlyRate = $hourlyRate;
    }

    /**
     * Returns activeHourlyRate.
     *
     * @return string
     */
    public function getActiveHourlyRate()
    {
        return $this->activeHourlyRate;
    }

    /**
     * @param string $activeHourlyRate
     */
    public function setActiveHourlyRate($activeHourlyRate = null)
    {
        $this->activeHourlyRate = $activeHourlyRate;
    }

    /**
     * Returns hourlyRatesPerService.
     *
     * @return mixed
     */
    public function getHourlyRatesPerService()
    {
        return $this->hourlyRatesPerService;
    }

    /**
     * @param mixed $hourlyRatesPerService
     */
    public function setHourlyRatesPerService(array $hourlyRatesPerService = array())
    {
        $this->hourlyRatesPerService = $hourlyRatesPerService;
    }

    /**
     * Returns archived.
     *
     * @return boolean
     */
    public function isArchived()
    {
        return $this->archived;
    }

    /**
     * @param boolean $archived
     */
    public function setArchived(bool $archived)
    {
        $this->archived = $archived;
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
