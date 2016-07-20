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
 * Contains lrackwitz\mite\Service\Builder\ServiceResourceBuilder.php.
 */
namespace lrackwitz\mite\Service\Builder;

use lrackwitz\mite\Entities\Resource\BuilderInterface;
use lrackwitz\mite\Entities\Resource\Service;
use lrackwitz\mite\Entities\Resource\ServiceInterface;

/**
 * Class ServiceResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class ServiceResourceBuilder implements BuilderInterface, ServiceInterface
{
    /**
     * The service resource.
     *
     * @var Service
     */
    private $service;

    /**
     * Creates a new service instance.
     */
    public function create()
    {
        $this->service = new Service();
    }

    /**
     * Returns the built service instance.
     *
     * @return ServiceInterface
     */
    public function getResult()
    {
        return $this->service;
    }

    /**
     * Sets the id.
     *
     * @param int $id
     */
    public function setId($id = null)
    {
        $this->service->setId($id);
    }

    /**
     * Sets the name.
     *
     * @param string $name
     */
    public function setName($name = null)
    {
        $this->service->setName($name);
    }

    /**
     * Sets the note.
     *
     * @param string $note
     */
    public function setNote($note = null)
    {
        $this->service->setNote($note);
    }

    /**
     * Sets the hourly rate.
     *
     * @param int $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null)
    {
        $this->service->setHourlyRate($hourlyRate);
    }

    /**
     * Sets the archived flag.
     *
     * @param bool $archived
     */
    public function setArchived(bool $archived = false)
    {
        $this->service->setArchived($archived);
    }

    /**
     * Sets the billable flag.
     *
     * @param bool $billable
     */
    public function setBillable(bool $billable = false)
    {
        $this->service->setBillable($billable);
    }

    /**
     * Sets the date and time of creation.
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->service->setCreatedAt($createdAt);
    }

    /**
     * Sets the date and time of last update.
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->service->setUpdatedAt($updatedAt);
    }
}
