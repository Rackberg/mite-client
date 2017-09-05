<?php
/**
 * @file
 * Contains lrackwitz\mite\Service\Manager\ProjectManager.php.
 */

namespace lrackwitz\mite\Service\Manager;

use lrackwitz\mite\Entities\Resource\Project;
use lrackwitz\mite\Service\MiteClient;
use lrackwitz\mite\Service\ResourceBuilderFactory;
use lrackwitz\mite\Service\ResourceDirector;

/**
 * Class ProjectManager.
 *
 * @package lrackwitz\mite\Service\Manager
 */
class ProjectManager
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
     * The resource director.
     *
     * @var \lrackwitz\mite\Service\ResourceDirector
     */
    private $director;

    /**
     * ProjectManager constructor.
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
     * Returns a project instance by id.
     *
     * @param int $project_id The project id.
     *
     * @return \lrackwitz\mite\Entities\Resource\Project The project instance.
     */
    public function getProject($project_id): Project
    {
        $project = null;

        // Request the time entry via the api.
        $response = $this->client->readProject($project_id);
        if ($response->getStatusCode() != 200) {
            return null;
        }

        // Convert the data into a php array.
        $data = json_decode($response->getBody()->getContents(), true);

        // Create a project instance.
        if (isset($data['project'])) {
            $builder = $this->factory->createProjectResourceBuilder();
            $project = $this->director->build($builder, $data['project']);
        }

        return $project;
    }

}
