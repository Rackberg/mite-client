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
 * Contains lrackwitz\mite\Service\ResourceDirector.php.
 */
namespace lrackwitz\mite\Service;

use lrackwitz\mite\Entities\Resource\ResourceBuilderInterface;

/**
 * Class ResourceDirector.
 *
 * @package lrackwitz\mite\Service
 */
class ResourceDirector
{
    public function build(ResourceBuilderInterface $builder, array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $builder->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $builder->setName($data['name']);
        }
        if (array_key_exists('title', $data)) {
            $builder->setTitle($data['title']);
        }
        if (array_key_exists('currency', $data)) {
            $builder->setCurrency($data['currency']);
        }
        if (array_key_exists('created_at', $data)) {
            $builder->setCreatedAt(new \DateTime($data['created_at']));
        }
        if (array_key_exists('updated_at', $data)) {
            $builder->setUpdatedAt(new \DateTime($data['updated_at']));
        }
        if (array_key_exists('minutes', $data)) {
            $builder->setMinutes($data['minutes']);
        }
        if (array_key_exists('date_at', $data)) {
            $builder->setDateAt($data['date_at']);
        }
        if (array_key_exists('note', $data)) {
            $builder->setNote($data['note']);
        }
        if (array_key_exists('billable', $data)) {
            $builder->setBillable($data['billable']);
        }
        if (array_key_exists('locked', $data)) {
            $builder->setLocked($data['locked']);
        }
        if (array_key_exists('revenue', $data)) {
            $builder->setRevenue($data['revenue']);
        }
        if (array_key_exists('hourly_rate', $data)) {
            $builder->setHourlyRate($data['hourly_rate']);
        }
        if (array_key_exists('user_id', $data)) {
            $builder->setUserId($data['user_id']);
        }
        if (array_key_exists('user_name', $data)) {
            $builder->setUserName($data['user_name']);
        }
        if (array_key_exists('project_id', $data)) {
            $builder->setProjectId($data['project_id']);
        }
        if (array_key_exists('project_name', $data)) {
            $builder->setProjectName($data['project_name']);
        }
        if (array_key_exists('customer_id', $data)) {
            $builder->setCustomerId($data['customer_id']);
        }
        if (array_key_exists('customer_name', $data)) {
            $builder->setCustomerName($data['customer_name']);
        }
        if (array_key_exists('service_id', $data)) {
            $builder->setServiceId($data['service_id']);
        }
        if (array_key_exists('service_name', $data)) {
            $builder->setServiceName($data['service_name']);
        }
        if (array_key_exists('month', $data)) {
            $builder->setMonth($data['month']);
        }
        if (array_key_exists('time_entries_params', $data)) {
            $builder->setParams($data['time_entries_params']);
        }
        if (array_key_exists('since', $data)) {
            $builder->setSince(new \DateTime($data['since']));
        }
        if (array_key_exists('budget', $data)) {
            $builder->setBudget($data['budget']);
        }
        if (array_key_exists('budget_type', $data)) {
            $builder->setBudgetType($data['budget_type']);
        }
        if (array_key_exists('active_hourly_rate', $data)) {
            $builder->setActiveHourlyRate($data['active_hourly_rate']);
        }
        if (array_key_exists('hourly_rates_per_service', $data)) {
            $builder->setHourlyRatesPerService(
                $data['hourly_rates_per_service']
            );
        }
        if (array_key_exists('archived', $data)) {
            $builder->setArchived($data['archived']);
        }

        return $builder->getResult();
    }
}
