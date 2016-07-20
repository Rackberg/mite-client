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

use lrackwitz\mite\Entities\Resource\BuilderInterface;
use lrackwitz\mite\Entities\Resource\Project;
use lrackwitz\mite\Entities\Resource\ProjectInterface;

/**
 * Class ProjectResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class ProjectResourceBuilder implements BuilderInterface, ProjectInterface
{
    /**
     * The project resource.
     *
     * @var Project
     */
    private $project;

    /**
     * Creates a new project instance.
     */
    public function create()
    {
        $this->project = new Project();
    }

    /**
     * Sets the project id.
     *
     * @param int $id
     */
    public function setId($id = null)
    {
        $this->project->setId($id);
    }

    /**
     * Sets the name.
     *
     * @param string $name
     */
    public function setName($name = null)
    {
        $this->project->setName($name);
    }

    /**
     * Sets the note.
     *
     * @param string $note
     */
    public function setNote($note = null)
    {
        $this->project->setNote($note);
    }

    /**
     * Sets the customer id.
     *
     * @param int $customerId
     */
    public function setCustomerId($customerId = null)
    {
        $this->project->setCustomerId($customerId);
    }

    /**
     * Sets the customer name.
     *
     * @param string $customerName
     */
    public function setCustomerName($customerName = null)
    {
        $this->project->setCustomerName($customerName);
    }

    /**
     * Sets the hourly rate.
     *
     * @param string $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null)
    {
        $this->project->setHourlyRate($hourlyRate);
    }

    /**
     * Sets the active hourly rate.
     *
     * @param string $activeHourlyRate
     */
    public function setActiveHourlyRate($activeHourlyRate = null)
    {
        $this->project->setActiveHourlyRate($activeHourlyRate);
    }

    /**
     * Sets the hourly rates per service.
     *
     * @param array $hourlyRatesPerService
     */
    public function setHourlyRatesPerService(array $hourlyRatesPerService = array())
    {
        $this->project->setHourlyRatesPerService($hourlyRatesPerService);
    }

    /**
     * Sets the budget.
     *
     * @param int $budget
     */
    public function setBudget($budget = null)
    {
        $this->project->setBudget($budget);
    }

    /**
     * Sets the budget type.
     *
     * @param string $budgetType
     */
    public function setBudgetType($budgetType = null)
    {
        $this->project->setBudgetType($budgetType);
    }

    /**
     * Sets the archived flag.
     *
     * @param bool $archived
     */
    public function setArchived(bool $archived = null)
    {
        $this->project->setArchived($archived);
    }

    /**
     * Sets the date and time of creation.
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->project->setCreatedAt($createdAt);
    }

    /**
     * Sets the date and time of last update.
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->project->setUpdatedAt($updatedAt);
    }

    /**
     * Returns the built project instance.
     *
     * @return \lrackwitz\mite\Entities\Resource\ProjectInterface
     */
    public function getResult()
    {
        return $this->project;
    }
}
