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
 * Contains lrackwitz\mite\Entities\Resource\Account.php.
 */
namespace lrackwitz\mite\Entities\Resource;

use lrackwitz\mite\Entities\Loggable;

/**
 * Class Account.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
class Account extends Loggable implements ResourceInterface
{
    /**
     * The account id.
     *
     * @var int
     */
    private $id;

    /**
     * The name.
     *
     * @var string
     */
    private $name;

    /**
     * The title.
     *
     * @var string
     */
    private $title;

    /**
     * The currency.
     *
     * @var string
     */
    private $currency;

    /**
     * The date and time of creation.
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * The date and time of last modification.
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Account constructor.
     *
     * Creates a new Account instance.
     *
     * @param int $id The account id.
     * @param string $name The name.
     * @param string $title The title.
     * @param string $currency The currency.
     * @param \DateTime $createdAt The date and time of creation.
     * @param \DateTime $updatedAt The date and time of last modification.
     */
    public function __construct(
        $id = null,
        $name = null,
        $title = null,
        $currency = null,
        \DateTime $createdAt = null,
        \DateTime $updatedAt = null
    ) {
        if ($id) {
            $this->id = $id;
        }
        if ($name) {
            $this->name = $name;
        }
        if ($title) {
            $this->title = $title;
        }
        if ($currency) {
            $this->currency = $currency;
        }
        if ($createdAt) {
            $this->createdAt = $createdAt;
        }
        if ($updatedAt) {
            $this->updatedAt = $updatedAt;
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
     * Returns createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns currency.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * Returns updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
