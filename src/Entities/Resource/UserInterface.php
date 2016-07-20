<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\UserInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface UserInterface
{
    /**
     * Returns the id.
     *
     * @return int
     */
    public function getId();

    /**
     * Sets the id.
     *
     * @param int $id
     */
    public function setId($id = null);

    /**
     * Returns the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the name.
     *
     * @param string $name
     */
    public function setName($name = null);

    /**
     * Returns the email address.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Sets the email address.
     *
     * @param string $email
     */
    public function setEmail($email = null);

    /**
     * Returns the note.
     *
     * @return string
     */
    public function getNote();

    /**
     * Sets the note.
     *
     * @param string $note
     */
    public function setNote($note = null);

    /**
     * Returns the archived flag.
     *
     * @return bool
     */
    public function isArchived();

    /**
     * Sets the archived flag.
     *
     * @param bool $archived
     */
    public function setArchived(bool $archived = false);

    /**
     * Returns the role.
     *
     * @return string
     */
    public function getRole();

    /**
     * Sets the role.
     *
     * @param string $role
     */
    public function setRole($role = null);

    /**
     * Returns the language.
     *
     * @return string
     */
    public function getLanguage();

    /**
     * Sets the language.
     *
     * @param string $language
     */
    public function setLanguage($language = null);

    /**
     * Returns the date and time of creation.
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Sets the date and time of creation.
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null);

    /**
     * Returns the date and time of last update.
     *
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * Sets the date and time of last update.
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null);
}
