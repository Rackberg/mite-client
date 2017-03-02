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
 * Contains lrackwitz\mite\Entities\Resource\Customer.php.
 */
namespace lrackwitz\mite\Entities\Resource;

use lrackwitz\mite\Entities\Loggable;

/**
 * Class Customer.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
class Customer extends Loggable implements CustomerInterface
{
    /**
     * The customer name.
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
     * The active hourly rate.
     *
     * @var string
     */
    private $activeHourlyRate;

    /**
     * Hourly rate in cent.
     *
     * @var int
     */
    private $hourlyRate;

    /**
     * An array with hourly rates per service.
     *
     * @var []
     */
    private $hourlyRatesPerService;

    /**
     * A flag indicating if this customer is archived.
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
