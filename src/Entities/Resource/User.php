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
 * Contains lrackwitz\mite\Entities\Resource\User.php.
 */
namespace lrackwitz\mite\Entities\Resource;

use lrackwitz\mite\Entities\Loggable;

/**
 * Class User.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
class User extends Loggable implements UserInterface
{
    /**
     * The user id.
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
     * The email address.
     *
     * @var string
     */
    private $email;

    /**
     * A note.
     *
     * @var string
     */
    private $note;

    /**
     * Flag indicating if the user is archived.
     *
     * @var boolean
     */
    private $archived;

    /**
     * The role.
     *
     * @var string
     */
    private $role;

    /**
     * The language code.
     *
     * @var string
     */
    private $language;

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
     * User constructor.
     *
     * Creates a new user resource instance.
     *
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $note
     * @param boolean $archived
     * @param string $role
     * @param string $language
     * @param \DateTime|null $createdAt
     * @param \DateTime|null $updatedAt
     */
    public function __construct(
        $id = null,
        $name = null,
        $email = null,
        $note = null,
        $archived = null,
        $role = null,
        $language = null,
        \DateTime $createdAt = null,
        \DateTime $updatedAt = null
    ) {
        if ($id) {
            $this->id = $id;
        }
        if ($name) {
            $this->name = $name;
        }
        if ($email) {
            $this->email = $email;
        }
        if ($note) {
            $this->note = $note;
        }
        if ($archived != null) {
            $this->archived = $archived;
        }
        if ($role) {
            $this->role = $role;
        }
        if ($language) {
            $this->language = $language;
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
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email = null)
    {
        $this->email = $email;
    }

    /**
     * {@inheritDoc}
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * {@inheritDoc}
     */
    public function setNote($note = null)
    {
        $this->note = $note;
    }

    /**
     * {@inheritDoc}
     */
    public function isArchived()
    {
        return $this->archived;
    }

    /**
     * {@inheritDoc}
     */
    public function setArchived(bool $archived = false)
    {
        $this->archived = $archived;
    }

    /**
     * {@inheritDoc}
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * {@inheritDoc}
     */
    public function setRole($role = null)
    {
        $this->role = $role;
    }

    /**
     * {@inheritDoc}
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * {@inheritDoc}
     */
    public function setLanguage($language = null)
    {
        $this->language = $language;
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }
}
