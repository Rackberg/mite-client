<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\ServiceInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

/**
 * Interface ServiceInterface.
 *
 * @package lrackwitz\mite\Entities\Resource
 */
interface ServiceInterface
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
     * Returns the hourly rate.
     *
     * @return int
     */
    public function getHourlyRate();

    /**
     * Sets the hourly rate.
     *
     * @param int $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null);

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
     * Returns the billable flag.
     *
     * @return bool
     */
    public function isBillable();

    /**
     * Sets the billable flag.
     *
     * @param bool $billable
     */
    public function setBillable(bool $billable = false);

    /**
     * Returns the date and time of creation..
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
