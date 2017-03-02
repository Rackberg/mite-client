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

use lrackwitz\mite\Entities\Resource\Account;
use lrackwitz\mite\Entities\Resource\AccountInterface;
use lrackwitz\mite\Entities\Resource\BuilderInterface;

/**
 * Class AccountResourceBuilder.
 *
 * @package lrackwitz\mite\Service\Builder
 */
class AccountResourceBuilder implements BuilderInterface, AccountInterface
{
    /**
     * The account resource.
     *
     * @var Account
     */
    private $account;

    /**
     * Creates a new account instance.
     */
    public function create()
    {
        $this->account = new Account();
    }

    /**
     * Returns the build account instance.
     *
     * @return AccountInterface
     */
    public function getResult()
    {
        return $this->account;
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id = null)
    {
        $this->account->setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name = null)
    {
        $this->account->setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($title = null)
    {
        $this->account->setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function setCurrency($currency = null)
    {
        $this->account->setCurrency($currency);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->account->setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->account->setUpdatedAt($updatedAt);
    }
}
