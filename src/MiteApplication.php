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
 * Contains lrackwitz\mite\MiteApplication.php.
 */
namespace lrackwitz\mite;

use lrackwitz\mite\Command\ReadAccountCommand;
use lrackwitz\mite\Entities\DependencyCollection;
use lrackwitz\mite\Entities\PackageDependency;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class MiteApplication.
 *
 * @package lrackwitz\mite
 */
class MiteApplication extends Application
{
    private $environment;
    
    public function __construct()
    {
        parent::__construct('Mite Console Application (by Lars Rackwitz-Rosenberg)', '0.1.0');
    }

    /**
     * Returns a collection with dependencies.
     *
     * @return DependencyCollection
     */
    public function getDependencies()
    {
        // Read composer.json
        $json = file_get_contents(__DIR__ . '/../composer.json');
        $value = json_decode($json, true);
        
        $requirements = $value['require'];
        if (!empty($value['require-dev'])) {
            $requirements = array_merge($requirements, $value['require-dev']);
        }

        $dependencies = [];
        foreach ($requirements as $package => $constraint) {
            $dependencies[] = new PackageDependency($package, $constraint);
        }

        return new DependencyCollection($dependencies);
    }
}
