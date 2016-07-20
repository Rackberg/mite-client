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
     * Sets the id.
     *
     * @param int $id
     */
    public function setId($id = null);

    /**
     * Sets the name.
     *
     * @param string $name
     */
    public function setName($name = null);

    /**
     * Sets the note.
     *
     * @param string $note
     */
    public function setNote($note = null);

    /**
     * Sets the hourly rate.
     *
     * @param int $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null);

    /**
     * Sets the archived flag.
     *
     * @param bool $archived
     */
    public function setArchived(bool $archived = false);

    /**
     * Sets the billable flag.
     *
     * @param bool $billable
     */
    public function setBillable(bool $billable = false);

    /**
     * Sets the date and time of creation.
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null);

    /**
     * Sets the date and time of last update.
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null);
}
