<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\CustomerInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface CustomerInterface
{
    /**
     * Returns the customer name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the customer name.
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
     * Returns the active houly rate.
     *
     * @return string
     */
    public function getActiveHourlyRate();

    /**
     * Sets the active hourly rate.
     *
     * @param string $activeHourlyRate
     */
    public function setActiveHourlyRate($activeHourlyRate = null);

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
     * Returns the hourly rates per service.
     *
     * @return array
     */
    public function getHourlyRatesPerService();

    /**
     * Sets the hourly rates per service.
     *
     * @param array $hourlyRatesPerService
     */
    public function setHourlyRatesPerService(array $hourlyRatesPerService = array());

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
