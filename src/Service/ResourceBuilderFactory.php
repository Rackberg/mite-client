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
 * Contains lrackwitz\mite\Service\ResourceBuilderFactory.php.
 */
namespace lrackwitz\mite\Service;

use lrackwitz\mite\Entities\Resource\ResourceBuilderInterface;
use lrackwitz\mite\Service\Builder\AccountResourceBuilder;
use lrackwitz\mite\Service\Builder\ProjectResourceBuilder;
use lrackwitz\mite\Service\Builder\ServiceResourceBuilder;
use lrackwitz\mite\Service\Builder\StoppedTimeEntryResourceBuilder;
use lrackwitz\mite\Service\Builder\TimeEntryGroupBuilder;
use lrackwitz\mite\Service\Builder\TimeEntryResourceBuilder;
use lrackwitz\mite\Service\Builder\TrackingTimeEntryResourceBuilder;

/**
 * Class ResourceBuilderFactory.
 *
 * @package lrackwitz\mite\Service
 */
class ResourceBuilderFactory
{
    /**
     * @return ResourceBuilderInterface
     */
    public function createTimeEntryResourceBuilder()
    {
        return new TimeEntryResourceBuilder();
    }

    /**
     * @return ResourceBuilderInterface
     */
    public function createProjectResourceBuilder()
    {
        return new ProjectResourceBuilder();
    }

    /**
     * @return ResourceBuilderInterface
     */
    public function createServiceResourceBuilder()
    {
        return new ServiceResourceBuilder();
    }

    /**
     * @return ResourceBuilderInterface
     */
    public function createAccountResourceBuilder()
    {
        return new AccountResourceBuilder();
    }

    /**
     * @return ResourceBuilderInterface
     */
    public function createTimeEntryGroupResourceBuilder()
    {
        return new TimeEntryGroupBuilder();
    }

    /**
     * @return ResourceBuilderInterface
     */
    public function createTrackingTimeEntryResourceBuilder()
    {
        return new TrackingTimeEntryResourceBuilder();
    }

    public function createStoppedTimeEntryResourceBuilder()
    {
        return new StoppedTimeEntryResourceBuilder();
    }
}
