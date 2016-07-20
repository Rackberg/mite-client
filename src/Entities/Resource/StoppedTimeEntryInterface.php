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
 * Contains lrackwitz\mite\Entities\Resource\StoppedTimeEntryInterface.php.
 */
namespace lrackwitz\mite\Entities\Resource;

/**
 * Interface StoppedTimeEntryInterface.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
interface StoppedTimeEntryInterface
{
    /**
     * Sets the id.
     *
     * @param int $id
     */
    public function setId($id = null);

    /**
     * Sets the minutes.
     *
     * @param int $minutes
     */
    public function setMinutes($minutes = null);
}
