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
     * Sets the account name.
     *
     * @param string $name
     */
    public function setName($name = null);

    /**
     * Sets the account title.
     *
     * @param string $title
     */
    public function setTitle($title = null);

    /**
     * Sets the account currency.
     *
     * @param string $currency
     */
    public function setCurrency($currency = null);

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
