<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\AccountInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface AccountInterface
{
    /**
     * Sets the account id.
     *
     * @param int $id
     */
    public function setId($id = null);

    /**
     * Returns the account id.
     *
     * @return int
     */
    public function getId();

    /**
     * Sets the account name.
     *
     * @param string $name
     */
    public function setName($name = null);

    /**
     * Returns the account name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the account title.
     *
     * @param string $title
     */
    public function setTitle($title = null);

    /**
     * Returns the account title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Sets the account currency.
     *
     * @param string $currency
     */
    public function setCurrency($currency = null);

    /**
     * Returns the account currency.
     *
     * @return string
     */
    public function getCurrency();

    /**
     * Sets the date and time of creation.
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null);

    /**
     * Returns the date and time of creation.
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Sets the date and time of last update.
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null);

    /**
     * Returns the date and time of last update.
     *
     * @return \DateTime
     */
    public function getUpdatedAt();
}
