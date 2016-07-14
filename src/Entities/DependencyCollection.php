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
 * Contains lrackwitz\mite\Entities\DependencyCollection.php.
 */
namespace lrackwitz\mite\Entities;

/**
 * Class DependencyCollection.
 *
 * @package lrackwitz\mite\Entities
 */
class DependencyCollection
{
    /**
     * An array with package dependencies.
     *
     * @var PackageDependency[]
     */
    private $dependencies = [];

    public function __construct(array $dependencies = [])
    {
        $this->dependencies = $dependencies;
    }

    /**
     * Returns the dependencies as string.
     *
     * @param string $delimiter
     *
     * @return string
     */
    public function asString($delimiter = ' ')
    {
        $dependencies = $this->asArray();

        return join($delimiter, $dependencies);
    }

    /**
     * Returns an array of dependencies.
     *
     * @return []
     */
    public function asArray()
    {
        $dependencies = [];
        foreach ($this->dependencies as $dependency) {
            $dependencies[] = $dependency->getPackage() . '/' . $dependency->getConstraint();
        }

        return $dependencies;
    }

    public function __toString()
    {
        return $this->asString();
    }
}
