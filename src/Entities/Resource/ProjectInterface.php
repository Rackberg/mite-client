<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\ProjectInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface ProjectInterface
{
    /**
     * Returns the project id.
     *
     * @return int
     */
    public function getId();

    /**
     * Sets the project id.
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
     * Returns the budget.
     *
     * @return int
     */
    public function getBudget();

    /**
     * Sets the budget.
     *
     * @param int $budget
     */
    public function setBudget($budget = null);

    /**
     * Returns the budget type.
     *
     * @return string
     */
    public function getBudgetType();

    /**
     * Sets the budget type.
     *
     * @param string $budgetType
     */
    public function setBudgetType($budgetType = null);

    /**
     * Returns the hourly rate.
     *
     * @return string
     */
    public function getHourlyRate();

    /**
     * Sets the hourly rate.
     *
     * @param string $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null);

    /**
     * Returns the active hourly rate.
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
