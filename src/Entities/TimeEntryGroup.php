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
 * Contains lrackwitz\mite\Entities\TimeEntryGroup.php.
 */
namespace lrackwitz\mite\Entities;

/**
 * Class TimeEntryGroup.
 *
 * @package lrackwitz\mite\Entities
 */
class TimeEntryGroup extends Loggable
{
    /**
     * The number of minutes.
     *
     * @var int
     */
    private $minutes;

    /**
     * The revenue.
     *
     * @var string
     */
    private $revenue;

    /**
     * The project id.
     *
     * @var int
     */
    private $projectId;

    /**
     * The project name.
     *
     * @var string
     */
    private $projectName;

    /**
     * The month in format YYYYMM.
     *
     * @var string
     */
    private $month;

    /**
     * The parameters used to get the group values.
     *
     * @var []
     */
    private $params;

    public function __construct(
        $projectId = null,
        $projectName = null,
        $minutes = null,
        $revenue = null,
        $month = null,
        array $params = array()
    ) {
        if ($projectId) {
            $this->projectId = $projectId;
        }
        if ($projectName) {
            $this->projectName = $projectName;
        }
        if ($minutes) {
            $this->minutes = $minutes;
        }
        if ($revenue) {
            $this->revenue = $revenue;
        }
        if ($month) {
            $this->month = $month;
        }
        if ($params) {
            $this->params = $params;
        }
    }

    public function __toString()
    {
        $attributes = get_class_vars(get_class($this));
        array_walk($attributes, function (&$value, $key) {
            $value = $this->{$key};
        });
        return parent::toString(__CLASS__, $attributes);
    }

    /**
     * Returns minutes.
     *
     * @return int
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param int $minutes
     */
    public function setMinutes($minutes = null)
    {
        $this->minutes = $minutes;
    }

    /**
     * Returns revenue.
     *
     * @return string
     */
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * @param string $revenue
     */
    public function setRevenue($revenue = null)
    {
        $this->revenue = $revenue;
    }

    /**
     * Returns projectId.
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    public function setProjectId($projectId = null)
    {
        $this->projectId = $projectId;
    }

    /**
     * Returns projectName.
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * @param string $projectName
     */
    public function setProjectName($projectName = null)
    {
        $this->projectName = $projectName;
    }

    /**
     * Returns month.
     *
     * @return string
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param string $month
     */
    public function setMonth($month = null)
    {
        $this->month = $month;
    }

    /**
     * Returns params.
     *
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams(array $params = array())
    {
        $this->params = $params;
    }
}
