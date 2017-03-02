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
 * Contains lrackwitz\mite\Entities\Resource\Service.php.
 */
namespace lrackwitz\mite\Entities\Resource;

use lrackwitz\mite\Entities\Loggable;

/**
 * Class Service.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
class Service extends Loggable implements ResourceInterface
{
    /**
     * The service id.
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
     * The hourly rate in cent.
     *
     * @var int
     */
    private $hourlyRate;

    /**
     * A flag indicating if the service is archived.
     *
     * @var boolean
     */
    private $archived;

    /**
     * A flag indicating if the service is billable.
     *
     * @var boolean
     */
    private $billable;

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

    /**
     * Service constructor.
     *
     * Creates a new service resource instance.
     *
     * @param int $id
     * @param string $name
     * @param string $note
     * @param int $hourlyRate
     * @param bool $archived
     * @param bool $billable
     * @param \DateTime $createdAt
     * @param \DateTime $updatedAt
     */
    public function __construct(
        $id = null,
        $name = null,
        $note = null,
        $hourlyRate = null,
        $archived = null,
        $billable = null,
        \DateTime $createdAt = null,
        \DateTime $updatedAt = null
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
        if ($hourlyRate) {
            $this->hourlyRate = $hourlyRate;
        }
        if ($archived != null) {
            $this->archived = $archived;
        }
        if ($billable != null) {
            $this->billable = $billable;
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
    public function setId($id)
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
    public function setBillable($billable)
    {
        $this->billable = $billable;
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
