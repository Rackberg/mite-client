<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\TimeEntryInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface TimeEntryInterface
{
    /**
     * Sets the id.
     *
     * @param string $id
     */
    public function setId($id = null);

    /**
     * Sets the minutes.
     *
     * @param int $minutes
     */
    public function setMinutes($minutes = null);

    /**
     * Sets the at date (format YYYY-MM-DD).
     *
     * @param string $dateAt
     */
    public function setDateAt($dateAt = null);

    /**
     * Sets the note.
     *
     * @param string $note
     */
    public function setNote($note = null);

    /**
     * Sets the billable flag.
     *
     * @param bool $billable
     */
    public function setBillable(bool $billable = false);

    /**
     * Sets the locked flag.
     *
     * @param bool $locked
     */
    public function setLocked(bool $locked = false);

    /**
     * Sets the revenue.
     *
     * @param string $revenue
     */
    public function setRevenue($revenue = null);

    /**
     * Sets the hourly rate.
     *
     * @param int $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null);

    /**
     * Sets the user id.
     *
     * @param int $userId
     */
    public function setUserId($userId = null);

    /**
     * Sets the user name.
     *
     * @param string $userName
     */
    public function setUserName($userName = null);

        /**
     * Sets the project id.
     *
     * @param int $projectId
     */
    public function setProjectId($projectId = null);

    /**
     * Sets the project name.
     *
     * @param string $projectName
     */
    public function setProjectName($projectName = null);

    /**
     * Sets the customer id.
     *
     * @param int $customerId
     */
    public function setCustomerId($customerId = null);

    /**
     * Sets the customer name.
     *
     * @param string $customerName
     */
    public function setCustomerName($customerName = null);

    /**
     * Sets the service id.
     *
     * @param int $serviceId
     */
    public function setServiceId($serviceId = null);

    /**
     * Sets the service name.
     *
     * @param string $serviceName
     */
    public function setServiceName($serviceName = null);

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
