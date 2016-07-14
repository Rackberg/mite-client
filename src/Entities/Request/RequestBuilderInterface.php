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
 * Contains lrackwitz\mite\Entities\Request\RequestBuilderInterface.php.
 */
namespace lrackwitz\mite\Entities\Request;

use GuzzleHttp\Psr7\Request;
use lrackwitz\mite\Entities\Resource\ResourceInterface;

interface RequestBuilderInterface
{
    /**
     * Sets the request method.
     *
     * Can be either HEAD, GET, POST, PATCH or DELETE.
     *
     * @param string $method
     *
     * @return RequestBuilderInterface
     */
    public function setMethod($method);

    /**
     * Sets the uri.
     *
     * @param string $uri
     *
     * @return RequestBuilderInterface
     */
    public function setUri($uri);

    /**
     * Sets the header data.
     *
     * @param array $header
     *
     * @return RequestBuilderInterface
     */
    public function setHeader(array $header = []);

    /**
     * Sets the data.
     *
     * @param array $data
     *
     * @return RequestBuilderInterface
     */
    public function setData(array $data = []);

    /**
     * Sets the resource.
     *
     * @param \lrackwitz\mite\Entities\Resource\ResourceInterface $resource
     *
     * @return RequestBuilderInterface
     */
    public function setResource(ResourceInterface $resource);

    /**
     * Returns the built request.
     *
     * @return Request
     */
    public function getResult();
}
