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
class Service extends Loggable implements ServiceInterface
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
    public function isBillable()
    {
        return $this->billable;
    }

    /**
     * {@inheritDoc}
     */
    public function setBillable(bool $billable = false)
    {
        $this->billable = $billable;
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
