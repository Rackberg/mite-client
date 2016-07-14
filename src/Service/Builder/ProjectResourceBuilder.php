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
 * Contains lrackwitz\mite\Service\Builder\ProjectResourceBuilder.php.
 */
namespace lrackwitz\mite\Service\Builder;

use lrackwitz\mite\Entities\Resource\AbstractResourceBuilder;
use lrackwitz\mite\Entities\Resource\Project;

/**
 * Class ProjectResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class ProjectResourceBuilder extends AbstractResourceBuilder
{
    /**
     * The project resource.
     *
     * @var Project
     */
    private $project;

    public function __construct()
    {
        $this->project = new Project();
    }

    public function setId($id = null)
    {
        $this->project->setId($id);
    }

    public function setName($name = null)
    {
        $this->project->setName($name);
    }

    public function setNote($note = null)
    {
        $this->project->setNote($note);
    }

    public function setCustomerId($customerId = null)
    {
        $this->project->setCustomerId($customerId);
    }

    public function setCustomerName($customerName = null)
    {
        $this->project->setCustomerName($customerName);
    }

    public function setHourlyRate($hourlyRate = null)
    {
        $this->project->setHourlyRate($hourlyRate);
    }

    public function setActiveHourlyRate($activeHourlyRate = null)
    {
        $this->project->setActiveHourlyRate($activeHourlyRate);
    }

    public function setHourlyRatesPerService(array $hourlyRatesPerService = array())
    {
        $this->project->setHourlyRatesPerService($hourlyRatesPerService);
    }

    public function setBudget($budget = null)
    {
        $this->project->setBudget($budget);
    }

    public function setBudgetType($budgetType = null)
    {
        $this->project->setBudgetType($budgetType);
    }

    public function setArchived(bool $archived = null)
    {
        $this->project->setArchived($archived);
    }

    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->project->setCreatedAt($createdAt);
    }

    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->project->setUpdatedAt($updatedAt);
    }

    public function getResult()
    {
        return $this->project;
    }
}
