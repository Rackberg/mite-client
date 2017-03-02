<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\ProjectInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface ProjectInterface
{
    /**
     * Sets the project id.
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
     * Sets the budget.
     *
     * @param int $budget
     */
    public function setBudget($budget = null);

    /**
     * Sets the budget type.
     *
     * @param string $budgetType
     */
    public function setBudgetType($budgetType = null);

    /**
     * Sets the hourly rate.
     *
     * @param string $hourlyRate
     */
    public function setHourlyRate($hourlyRate = null);

    /**
     * Sets the active hourly rate.
     *
     * @param string $activeHourlyRate
     */
    public function setActiveHourlyRate($activeHourlyRate = null);

    /**
     * Sets the hourly rates per service.
     *
     * @param array $hourlyRatesPerService
     */
    public function setHourlyRatesPerService(array $hourlyRatesPerService = array());

    /**
     * Sets the archived flag.
     *
     * @param bool $archived
     */
    public function setArchived(bool $archived = false);

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
