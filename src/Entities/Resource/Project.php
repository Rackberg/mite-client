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
class Project extends Loggable implements ProjectInterface
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
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * {@inheritDoc}
     */
    public function setNote($note = null)
    {
        $this->note = $note;
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * {@inheritDoc}
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * {@inheritDoc}
     */
    public function setCustomerName($customerName = null)
    {
        $this->customerName = $customerName;
    }

    /**
     * {@inheritDoc}
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * {@inheritDoc}
     */
    public function setBudget($budget = null)
    {
        $this->budget = $budget;
    }

    /**
     * {@inheritDoc}
     */
    public function getBudgetType()
    {
        return $this->budgetType;
    }

    /**
     * {@inheritDoc}
     */
    public function setBudgetType($budgetType = null)
    {
        $this->budgetType = $budgetType;
    }

    /**
     * {@inheritDoc}
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    /**
     * {@inheritDoc}
     */
    public function setHourlyRate($hourlyRate = null)
    {
        $this->hourlyRate = $hourlyRate;
    }

    /**
     * {@inheritDoc}
     */
    public function getActiveHourlyRate()
    {
        return $this->activeHourlyRate;
    }

    /**
     * {@inheritDoc}
     */
    public function setActiveHourlyRate($activeHourlyRate = null)
    {
        $this->activeHourlyRate = $activeHourlyRate;
    }

    /**
     * {@inheritDoc}
     */
    public function getHourlyRatesPerService()
    {
        return $this->hourlyRatesPerService;
    }

    /**
     * {@inheritDoc}
     */
    public function setHourlyRatesPerService(array $hourlyRatesPerService = array())
    {
        $this->hourlyRatesPerService = $hourlyRatesPerService;
    }

    /**
     * {@inheritDoc}
     */
    public function isArchived()
    {
        return $this->archived;
    }

    /**
     * {@inheritDoc}
     */
    public function setArchived(bool $archived = false)
    {
        $this->archived = $archived;
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }
}
