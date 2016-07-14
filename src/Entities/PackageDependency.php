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
 * Contains lrackwitz\mite\Entities\PackageDependency.php.
 */
namespace lrackwitz\mite\Entities;

/**
 * Class PackageDependency.
 *
 * @package lrackwitz\mite\Entities
 */
class PackageDependency
{
    /**
     * The package name.
     *
     * @var string
     */
    private $package;

    /**
     * The version constraint.
     *
     * @var string
     */
    private $constraint;

    public function __construct($package, $constraint)
    {
        $this->package = $package;
        $this->constraint = $constraint;
    }

    /**
     * Returns package.
     *
     * @return string
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Returns constraint.
     *
     * @return string
     */
    public function getConstraint()
    {
        return $this->constraint;
    }
}
