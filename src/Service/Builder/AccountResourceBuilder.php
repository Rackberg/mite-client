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
 * Contains lrackwitz\mite\Service\Builder\AccountResourceBuilder.php.
 */
namespace lrackwitz\mite\Service\Builder;

use lrackwitz\mite\Entities\Resource\AbstractResourceBuilder;
use lrackwitz\mite\Entities\Resource\Account;

/**
 * Class AccountResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class AccountResourceBuilder extends AbstractResourceBuilder
{
    /**
     * The account resource.
     *
     * @var Account
     */
    private $account;

    public function __construct()
    {
        $this->account = new Account();
    }

    public function setId($id = null)
    {
        $this->account->setId($id);
    }

    public function setName($name = null)
    {
        $this->account->setName($name);
    }

    public function setTitle($title = null)
    {
        $this->account->setTitle($title);
    }

    public function setCurrency($currency = null)
    {
        $this->account->setCurrency($currency);
    }

    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->account->setCreatedAt($createdAt);
    }

    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->account->setUpdatedAt($updatedAt);
    }

    public function getResult()
    {
        return $this->account;
    }
}
