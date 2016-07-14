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
 * Contains lrackwitz\mite\Entities\KeyAuthentication.php.
 */
namespace lrackwitz\mite\Entities;

/**
 * Class KeyAuthentication.
 *
 * @package lrackwitz\mite\Entities
 */
class KeyAuthentication extends Authentication
{
    /**
     * Returns the credentials needed for the current authentication type.
     *
     * @return string[]
     *      An associative array containing the api key.
     */
    public function getCredentials()
    {
        return [
            'api_key' => $this->getApiKey(),
        ];
    }
}
