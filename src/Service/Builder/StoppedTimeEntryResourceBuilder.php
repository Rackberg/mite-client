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
 * Contains lrackwitz\mite\Service\Builder\StoppedTimeEntryResourceBuilder.php.
 */
namespace lrackwitz\mite\Service\Builder;

use lrackwitz\mite\Entities\Resource\BuilderInterface;
use lrackwitz\mite\Entities\Resource\StoppedTimeEntry;
use lrackwitz\mite\Entities\Resource\StoppedTimeEntryInterface;

/**
 * Class StoppedTimeEntryResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class StoppedTimeEntryResourceBuilder implements BuilderInterface, StoppedTimeEntryInterface
{
    /**
     * The stopped time entry resource.
     *
     * @var StoppedTimeEntryInterface
     */
    private $stoppedTimeEntry;

    /**
     * Creates a new stopped time entry instance.
     */
    public function create()
    {
        $this->stoppedTimeEntry = new StoppedTimeEntry();
    }

    /**
     * Returns the built stopped time entry instance.
     *
     * @return StoppedTimeEntryInterface
     */
    public function getResult()
    {
        return $this->stoppedTimeEntry;
    }

    /**
     * Sets the id.
     *
     * @param int $id
     */
    public function setId($id = null)
    {
        $this->stoppedTimeEntry->setId($id);
    }

    /**
     * Sets the minutes.
     *
     * @param int $minutes
     */
    public function setMinutes($minutes = null)
    {
        $this->stoppedTimeEntry->setMinutes($minutes);
    }
}
