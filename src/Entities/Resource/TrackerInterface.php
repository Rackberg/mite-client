<?php
/**
 * @file
 * Contains lrackwitz\mite\Entities\Resource\TrackerInterface.php.
 */

namespace lrackwitz\mite\Entities\Resource;

interface TrackerInterface
{
    /**
     * Returns the tracking time entry.
     *
     * @return TrackingTimeEntryInterface
     */
    public function getTrackingTimeEntry();

    /**
     * Sets the tracking time entry.
     *
     * @param TrackingTimeEntryInterface $trackingTimeEntry
     */
    public function setTrackingTimeEntry(TrackingTimeEntryInterface $trackingTimeEntry = null);

    /**
     * Returns the stopped time entry.
     *
     * @return StoppedTimeEntryInterface
     */
    public function getStoppedTimeEntry();

    /**
     * Sets the stopped time entry.
     *
     * @param StoppedTimeEntryInterface $stoppedTimeEntry
     */
    public function setStoppedTimeEntry(StoppedTimeEntryInterface $stoppedTimeEntry = null);
}
