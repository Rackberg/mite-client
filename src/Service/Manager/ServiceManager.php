<?php
/**
 * @file
 * Contains lrackwitz\mite\Service\Manager\ServiceManager.php.
 */

namespace lrackwitz\mite\Service\Manager;

use lrackwitz\mite\Entities\Resource\Service;
use lrackwitz\mite\Service\MiteClient;
use lrackwitz\mite\Service\ResourceBuilderFactory;
use lrackwitz\mite\Service\ResourceDirector;

/**
 * Class ServiceManager.
 *
 * @package lrackwitz\mite\Service\Manager
 */
class ServiceManager
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
     * Returns a service instance by id.
     *
     * @param int $service_id The service id.
     *
     * @return \lrackwitz\mite\Entities\Resource\Service The service instance.
     */
    public function getService($service_id): Service
    {
        $service = null;

        // Request the time entry via the api.
        $response = $this->client->readService($service_id);
        if ($response->getStatusCode() != 200) {
            return null;
        }

        // Convert the data into a php array.
        $data = json_decode($response->getBody()->getContents(), true);

        // Create a project instance.
        if (isset($data['service'])) {
            $builder = $this->factory->createServiceResourceBuilder();
            $service = $this->director->build($builder, $data['service']);
        }

        return $service;
    }
}
