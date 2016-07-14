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

use lrackwitz\mite\Entities\Resource\AbstractResourceBuilder;
use lrackwitz\mite\Entities\Resource\TrackingTimeEntry;

/**
 * Class TrackingTimeEntryResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class TrackingTimeEntryResourceBuilder extends AbstractResourceBuilder
{
    /**
     * The tracking time entry.
     *
     * @var TrackingTimeEntry
     */
    private $trackingTimeEntry;

    public function __construct()
    {
        $this->trackingTimeEntry = new TrackingTimeEntry();
    }

    public function setId($id = null)
    {
        $this->trackingTimeEntry->setId($id);
    }

    public function setMinutes($minutes = null)
    {
        $this->trackingTimeEntry->setMinutes($minutes);
    }

    public function setSince(\DateTime $since = null)
    {
        $this->trackingTimeEntry->setSince($since);
    }


    public function getResult()
    {
        return $this->trackingTimeEntry;
    }
}
