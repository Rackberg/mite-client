<?php
/**
 * A console application that allows mite users to track their time.
 * Copyright (C) <2016>  <Lars Rackwitz-Rosenberg>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @file
 * Contains lrackwitz\mite\Service\CommandHelper.php.
 */
namespace lrackwitz\mite\Service;

use lrackwitz\mite\Entities\Resource\Project;
use lrackwitz\mite\Entities\Resource\Service;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Class CommandHelper.
 *
 * @package lrackwitz\mite\Service
 */
class CommandHelper
{
    /**
     * The mite client.
     *
     * @var MiteClient
     */
    protected $client;

    /**
     * The resource director.
     *
     * @var ResourceDirector
     */
    protected $director;

    /**
     * The resource builder factory.
     *
     * @var ResourceBuilderFactory
     */
    protected $factory;

    public function __construct(
        MiteClient $client,
        ResourceDirector $director,
        ResourceBuilderFactory $factory
    ) {
        $this->client = $client;
        $this->director = $director;
        $this->factory = $factory;
    }

    public function askForProject(
        InputInterface $input,
        OutputInterface $output,
        QuestionHelper $helper
    ) {
        $projectBuilder = $this->factory->createProjectResourceBuilder();
        $question = new Question('Which project? ');
        $projects = [];
        $projectsResponse = $this->client->readProjects();
        if ($projectsResponse->getStatusCode() == 200) {
            $data = json_decode($projectsResponse->getBody()->getContents(), true);
            foreach ($data as &$project) {
                /** @var Project $project */
                $project = $this->director->build($projectBuilder, $project['project']);
                $projects[$project->getId()] = $project->getFormattedNameWithCustomer();
            }
            $question->setAutocompleterValues($projects);
        }

        $project = $helper->ask($input, $output, $question);
        if ($project && $projects != array()) {
            foreach ($projects as $id => $name) {
                if ($name == $project) {
                    return $id;
                }
            }
        }

        return null;
    }

    public function askForService(
        InputInterface $input,
        OutputInterface $output,
        QuestionHelper $helper
    ) {
        $serviceBuilder = $this->factory->createServiceResourceBuilder();
        $question = new Question('Which service? ');
        $services = [];
        $servicesResponse = $this->client->readServices();
        if ($servicesResponse->getStatusCode() == 200) {
            $data = json_decode($servicesResponse->getBody()->getContents(), true);
            foreach ($data as &$service) {
                /** @var Service $service */
                $service = $this->director->build($serviceBuilder, $service['service']);
                $services[$service->getId()] = $service->getName();
            }
            $question->setAutocompleterValues($services);
        }

        $service = $helper->ask($input, $output, $question);
        if ($service && $services != array()) {
            foreach ($services as $id => $name) {
                if ($name == $service) {
                    return $id;
                }
            }
        }

        return null;
    }

    public function convertMinutesToTime($minutes, $format = '%02d:%02d')
    {
        if ($minutes < 1) {
            return sprintf($format, 0, 0);
        }
        $hours = floor($minutes / 60);
        $minutes = ($minutes % 60);
        return sprintf($format, $hours, $minutes);
    }

    /**
     * Returns the mite client.
     *
     * @return \lrackwitz\mite\Service\MiteClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Returns the resource director.
     *
     * @return \lrackwitz\mite\Service\ResourceDirector
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Returns the resource builder factory.
     *
     * @return \lrackwitz\mite\Service\ResourceBuilderFactory
     */
    public function getResourceBuilderFactory()
    {
        return $this->factory;
    }
}
