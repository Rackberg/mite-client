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
class Customer extends Loggable implements ResourceInterface
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
    public function setName($name)
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
    public function setNote($note)
    {
        $this->note = $note;
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
    public function setActiveHourlyRate($activeHourlyRate)
    {
        $this->activeHourlyRate = $activeHourlyRate;
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
    public function setHourlyRate($hourlyRate)
    {
        $this->hourlyRate = $hourlyRate;
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
    public function setHourlyRatesPerService($hourlyRatesPerService)
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
    public function setArchived($archived)
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
    public function setCreatedAt($createdAt)
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
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
