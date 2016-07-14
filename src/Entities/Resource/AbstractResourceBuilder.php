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
 * Contains lrackwitz\mite\Entities\Resource\AbstractResourceBuilder.php.
 */
namespace lrackwitz\mite\Entities\Resource;

/**
 * Class AbstractResourceBuilder.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
abstract class AbstractResourceBuilder implements ResourceBuilderInterface
{
    public function setBillable(bool $billable)
    {
    }

    public function setCreatedAt(\DateTime $createdAt = null)
    {
    }

    public function setCurrency($currency = null)
    {
    }

    public function setCustomerId($customerId = null)
    {
    }

    public function setCustomerName($customerName = null)
    {
    }

    public function setDateAt($dateAt = null)
    {
    }

    public function setHourlyRate($hourlyRate = null)
    {
    }

    public function setId($id = null)
    {
    }

    public function setLocked(bool $locked)
    {
    }

    public function setMinutes($minutes = null)
    {
    }

    public function setName($name = null)
    {
    }

    public function setNote($note = null)
    {
    }

    public function setProjectId($projectId = null)
    {
    }

    public function setProjectName($projectName = null)
    {
    }

    public function setRevenue($revenue = null)
    {
    }

    public function setServiceId($serviceId = null)
    {
    }

    public function setServiceName($serviceName = null)
    {
    }

    public function setTitle($title = null)
    {
    }

    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
    }

    public function setUserId($userId = null)
    {
    }

    public function setUserName($userName = null)
    {
    }

    public function setMonth($month = null)
    {
    }

    public function setParams(array $params = array())
    {
    }

    public function setSince(\DateTime $since = null)
    {
    }

    public function setBudget($budget = null)
    {
    }

    public function setBudgetType($budgetType = null)
    {
    }

    public function setActiveHourlyRate($activeHourlyRate = null)
    {
    }

    public function setHourlyRatesPerService(array $hourlyRatesPerService = array())
    {
    }

    public function setArchived(bool $archived = null)
    {
    }

    abstract public function getResult();
}
