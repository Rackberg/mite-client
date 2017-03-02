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

use lrackwitz\mite\Entities\Resource\AbstractResourceBuilder;
use lrackwitz\mite\Entities\Resource\Service;

/**
 * Class ServiceResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class ServiceResourceBuilder extends AbstractResourceBuilder
{
    /**
     * The service resource.
     *
     * @var Service
     */
    private $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function setBillable(bool $billable)
    {
        $this->service->setBillable($billable);
    }

    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->service->setCreatedAt($createdAt);
    }

    public function setHourlyRate($hourlyRate = null)
    {
        $this->service->setHourlyRate($hourlyRate);
    }

    public function setId($id = null)
    {
        $this->service->setId($id);
    }

    public function setName($name = null)
    {
        $this->service->setName($name);
    }

    public function setNote($note = null)
    {
        $this->service->setNote($note);
    }

    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->service->setUpdatedAt($updatedAt);
    }

    public function setArchived(bool $archived = null)
    {
        $this->service->setArchived($archived);
    }

    public function getResult()
    {
        return $this->service;
    }
}
