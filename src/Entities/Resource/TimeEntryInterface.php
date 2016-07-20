<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\TimeEntryInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface TimeEntryInterface
{
    /**
     * Returns the id.
     *
     * @return string
     */
    public function getId();

    /**
     * Sets the id.
     *
     * @param string $id
     */
    public function setId($id = null);

    /**
     * Returns the minutes.
     *
     * @return int
     */
    public function getMinutes();

    /**
     * Sets the minutes.
     *
     * @param int $minutes
     */
    public function setMinutes($minutes = null);

    /**
     * Returns the at date (format YYYY-MM-DD).
     *
     * @return string
     */
    public function getDateAt();

    /**
     * Sets the at date (format YYYY-MM-DD).
     *
     * @param string $dateAt
     */
    public function setDateAt($dateAt = null);

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
     * Returns the locked flag.
     *
     * @return bool
     */
    public function isLocked();

    /**
     * Sets the locked flag.
     *
     * @param bool $locked
     */
    public function setLocked(bool $locked = false);

    /**
     * Returns the revenue.
     *
     * @return string
     */
    public function getRevenue();

    /**
     * Sets the revenue.
     *
     * @param string $revenue
     */
    public function setRevenue($revenue = null);

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
     * Returns the user id.
     *
     * @return int
     */
    public function getUserId();

    /**
     * Sets the user id.
     *
     * @param int $userId
     */
    public function setUserId($userId = null);

    /**
     * Returns the user name.
     *
     * @return string
     */
    public function getUserName();

    /**
     * Sets the user name.
     *
     * @param string $userName
     */
    public function setUserName($userName = null);

    /**
     * Returns the project id.
     *
     * @return int
     */
    public function getProjectId();

    /**
     * Sets the project id.
     *
     * @param int $projectId
     */
    public function setProjectId($projectId = null);

    /**
     * Returns the project name.
     *
     * @return string
     */
    public function getProjectName();

    /**
     * Sets the project name.
     *
     * @param string $projectName
     */
    public function setProjectName($projectName = null);

    /**
     * Returns the customer id.
     *
     * @return int
     */
    public function getCustomerId();

    /**
     * Sets the customer id.
     *
     * @param int $customerId
     */
    public function setCustomerId($customerId = null);

    /**
     * Returns the customer name.
     *
     * @return string
     */
    public function getCustomerName();

    /**
     * Sets the customer name.
     *
     * @param string $customerName
     */
    public function setCustomerName($customerName = null);

    /**
     * Returns the service id.
     *
     * @return int
     */
    public function getServiceId();

    /**
     * Sets the service id.
     *
     * @param int $serviceId
     */
    public function setServiceId($serviceId = null);

    /**
     * Returns the service name.
     *
     * @return string
     */
    public function getServiceName();

    /**
     * Sets the service name.
     *
     * @param string $serviceName
     */
    public function setServiceName($serviceName = null);

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
