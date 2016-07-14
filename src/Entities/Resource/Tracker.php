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
 * Contains lrackwitz\mite\Entities\Resource\Tracker.php.
 */
namespace lrackwitz\mite\Entities\Resource;

use lrackwitz\mite\Entities\Loggable;

/**
 * Class Tracker.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
class Tracker extends Loggable implements ResourceInterface
{
    /**
     * The current tracking time entry.
     *
     * @var TrackingTimeEntryInterface
     */
    private $trackingTimeEntry;

    /**
     * The stopped time entry.
     *
     * @var StoppedTimeEntryInterface
     */
    private $stoppedTimeEntry;

    public function __construct(
        TrackingTimeEntryInterface $trackingTimeEntry = null,
        StoppedTimeEntryInterface $stoppedTimeEntry = null
    ) {
        if ($trackingTimeEntry) {
            $this->trackingTimeEntry = $trackingTimeEntry;
        }
        if ($stoppedTimeEntry) {
            $this->stoppedTimeEntry = $stoppedTimeEntry;
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
     * Returns trackingTimeEntry.
     *
     * @return TrackingTimeEntryInterface
     */
    public function getTrackingTimeEntry()
    {
        return $this->trackingTimeEntry;
    }

    /**
     * @param TrackingTimeEntryInterface $trackingTimeEntry
     */
    public function setTrackingTimeEntry($trackingTimeEntry = null)
    {
        $this->trackingTimeEntry = $trackingTimeEntry;
    }

    /**
     * Returns stoppedTimeEntry.
     *
     * @return StoppedTimeEntryInterface
     */
    public function getStoppedTimeEntry()
    {
        return $this->stoppedTimeEntry;
    }

    /**
     * @param StoppedTimeEntryInterface $stoppedTimeEntry
     */
    public function setStoppedTimeEntry($stoppedTimeEntry = null)
    {
        $this->stoppedTimeEntry = $stoppedTimeEntry;
    }
}
