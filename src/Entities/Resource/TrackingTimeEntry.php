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
 * Contains lrackwitz\mite\Entities\TrackingTimeEntry.php.
 */
namespace lrackwitz\mite\Entities\Resource;

use lrackwitz\mite\Entities\Loggable;

/**
 * Class TrackingTimeEntry.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
class TrackingTimeEntry extends Loggable implements TrackingTimeEntryInterface
{
    /**
     * The time entry id.
     *
     * @var int
     */
    private $id;

    /**
     * The tracked minutes.
     *
     * @var int
     */
    private $minutes;

    /**
     * The date and time since last tracking.
     *
     * @var \DateTime
     */
    private $since;

    /**
     * TrackingTimeEntry constructor.
     *
     * Creates a new tracking time entry instance.
     *
     * @param int $id
     * @param int $minutes
     * @param \DateTime|null $since
     */
    public function __construct(
        $id = null,
        $minutes = null,
        \DateTime $since = null
    ) {
        if ($id) {
            $this->id = $id;
        }
        if ($minutes) {
            $this->minutes = $minutes;
        }
        if ($since) {
            $this->since = $since;
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
     * @param int $id
     */
    public function setId($id = null)
    {
        $this->id = $id;
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
     * @param int $minutes
     */
    public function setMinutes($minutes = null)
    {
        $this->minutes = $minutes;
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
     * @param \DateTime $since
     */
    public function setSince(\DateTime $since = null)
    {
        $this->since = $since;
    }

    /**
     * Returns since.
     *
     * @return \DateTime
     */
    public function getSince()
    {
        return $this->since;
    }
}
