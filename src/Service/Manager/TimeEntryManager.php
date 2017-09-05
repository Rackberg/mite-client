<?php
/**
 * @file
 * Contains lrackwitz\mite\Service\Manager\TimeEntryManager.php.
 */

namespace lrackwitz\mite\Service\Manager;

use lrackwitz\mite\Entities\Resource\TimeEntry;
use lrackwitz\mite\Service\MiteClient;
use lrackwitz\mite\Service\ResourceBuilderFactory;
use lrackwitz\mite\Service\ResourceDirector;

/**
 * Class TimeEntryManager.
 *
 * @package lrackwitz\mite\Service\Manager
 */
class TimeEntryManager
{
    /**
     * The mite client.
     *
     * @var \lrackwitz\mite\Service\MiteClient
     */
    private $client;

    /**
     * The resource builder factory.
     *
     * @var \lrackwitz\mite\Service\ResourceBuilderFactory
     */
    private $factory;

    /**
     * The director of the builder pattern.
     *
     * @var \lrackwitz\mite\Service\ResourceDirector
     */
    private $director;

    /**
     * TimeEntryManager constructor.
     *
     * @param \lrackwitz\mite\Service\MiteClient $client The mite client.
     * @param \lrackwitz\mite\Service\ResourceBuilderFactory $factory The resource builder factory.
     * @param \lrackwitz\mite\Service\ResourceDirector $director The director of the builder pattern.
     */
    public function __construct(
        MiteClient $client,
        ResourceBuilderFactory $factory,
        ResourceDirector $director
    ) {
        $this->client = $client;
        $this->factory = $factory;
        $this->director = $director;
    }

    /**
     * Returns a time entry instance by id.
     *
     * @param int $time_entry_id The time entry id.
     *
     * @return \lrackwitz\mite\Entities\Resource\TimeEntry The time entry instance.
     */
    public function getTimeEntry($time_entry_id): TimeEntry
    {
        $timeEntry = null;

        // Request the time entry via the api.
        $response = $this->client->readTimeEntry($time_entry_id);
        if ($response->getStatusCode() != 200) {
            return null;
        }

        // Convert the data into a php array.
        $data = json_decode($response->getBody()->getContents(), true);

        // Create a time entry instance.
        if (isset($data['time_entry'])) {
            $builder = $this->factory->createTimeEntryResourceBuilder();
            $timeEntry = $this->director->build($builder, $data['time_entry']);
        }

        return $timeEntry;
    }
}
