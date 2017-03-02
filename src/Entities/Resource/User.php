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
class User extends Loggable implements ResourceInterface
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
     * Returns email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns note.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * Returns archived.
     *
     * @return boolean
     */
    public function isArchived()
    {
        return $this->archived;
    }

    /**
     * @param boolean $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    /**
     * Returns role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Returns language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
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
