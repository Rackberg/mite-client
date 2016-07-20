<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\TimeEntryGroupInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface TimeEntryGroupInterface
{
    /**
     * Sets the minutes.
     *
     * @param int $minutes
     */
    public function setMinutes($minutes = null);

    /**
     * Sets the revenue.
     *
     * @param string $revenue
     */
    public function setRevenue($revenue = null);

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
     * Sets the month.
     *
     * @param string $month
     */
    public function setMonth($month = null);

    /**
     * Sets the parameters.
     *
     * @param array $params
     */
    public function setParams(array $params = array());
}
