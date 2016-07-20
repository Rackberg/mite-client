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
 * Contains lrackwitz\mite\Service\Builder\TrackingTimeEntryResourceBuilder.
 */
namespace lrackwitz\mite\Service\Builder;

use lrackwitz\mite\Entities\Resource\BuilderInterface;
use lrackwitz\mite\Entities\Resource\TrackingTimeEntry;
use lrackwitz\mite\Entities\Resource\TrackingTimeEntryInterface;

/**
 * Class TrackingTimeEntryResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class TrackingTimeEntryResourceBuilder implements BuilderInterface, TrackingTimeEntryInterface
{
    /**
     * The tracking time entry.
     *
     * @var TrackingTimeEntry
     */
    private $trackingTimeEntry;

    /**
     * Creates a new tracking time entry resource.
     */
    public function create()
    {
        $this->trackingTimeEntry = new TrackingTimeEntry();
    }

    /**
     * Returns the built tracking time resource instance.
     *
     * @return TrackingTimeEntryInterface
     */
    public function getResult()
    {
        return $this->trackingTimeEntry;
    }

    /**
     * Sets the id.
     *
     * @param int $id
     */
    public function setId($id = null)
    {
        $this->trackingTimeEntry->setId($id);
    }

    /**
     * Sets the minutes.
     *
     * @param int $minutes
     */
    public function setMinutes($minutes = null)
    {
        $this->trackingTimeEntry->setMinutes($minutes);
    }

    /**
     * Sets the date and time sind start of tracking.
     *
     * @param \DateTime $since
     */
    public function setSince(\DateTime $since = null)
    {
        $this->trackingTimeEntry->setSince($since);
    }
}
