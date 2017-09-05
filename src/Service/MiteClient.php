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
 * Contains lrackwitz\mite\Service\MiteClient.php.
 */
namespace lrackwitz\mite\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use lrackwitz\mite\Entities\Resource\ResourceInterface;
use lrackwitz\mite\Entities\Resource\TimeEntry;
use lrackwitz\mite\MiteApplication;

/**
 * Class MiteClient.
 *
 * @package lrackwitz\mite\Service
 */
class MiteClient
{
    const MITE_DOMAIN = 'mite.yo.lk';

    /**
     * The mite application.
     *
     * @var MiteApplication
     */
    private $application;

    /**
     * The mite account name.
     *
     * @var string
     */
    private $accountName;

    /**
     * The guzzle http client.
     *
     * @var Client
     */
    private $client;

    /**
     * The mite api key.
     *
     * @var string
     */
    private $apiKey;

    private $headers = [];

    /**
     * The request factory.
     *
     * @var RequestFactory
     */
    private $requestFactory;

    public function __construct(
        MiteApplication $application,
        RequestFactory $requestFactory,
        $accountName,
        $apiKey
    ) {
        $this->application = $application;
        $this->requestFactory = $requestFactory;
        $this->accountName = $accountName;
        $this->apiKey = $apiKey;

        if (empty($this->apiKey) || empty($this->accountName)) {
            print 'Parameters "mite.account_name" and "mite.api_key" not set in config.yml' . "\n";
            exit;
        }

        $this->headers = [
          'User-Agent' => $this->getUserAgent(),
          'X-MiteApiKey' => $this->apiKey,
        ];

        $this->client = new Client(['base_uri' => $this->getBaseUri()]);
    }

    /**
     * Sends a request and returns the response.
     *
     * @param \GuzzleHttp\Psr7\Request $request
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function send(Request $request, array $json = [])
    {
        $options = ['headers' => $this->headers];
        if ($json) {
            $options['json'] = $json;
        }

        $response = null;
        try {
            $response = $this->client->send($request, $options);
        } catch (ConnectException $e) {
            // TODO: Add logging to a log file.
        }

        return $response;
    }

    private function getBaseUri()
    {
        return sprintf('https://%s.%s', $this->accountName, self::MITE_DOMAIN);
    }

    /**
     * Returns the user agent.
     *
     * @return string
     */
    public function getUserAgent()
    {
        return sprintf(
            'lrackwitz/mite/v%s; %s',
            $this->application->getVersion(),
            $this->application->getDependencies()->asString()
        );
    }

    public function readTimeEntries(array $options = array())
    {
        $request = $this->requestFactory->createRequest(
            'GET',
            '/time_entries.json?' . join('&', $options)
        );
        return $this->send($request);
    }
    
    public function addTimeEntry(
        $projectId = null,
        $serviceId = null,
        $minutes = 0,
        $comment = null
    ) {
        $request = $this->requestFactory->createRequest(
            'POST',
            '/time_entries.json'
        );

        $data = [
            'time_entry' => [
                'project_id' => $projectId,
                'service_id' => $serviceId,
                'minutes' => $minutes,
                'note' => $comment,
            ]
        ];

        return $this->send($request, $data);
    }

    public function editTimeEntry($id, array $data)
    {
        $request = $this->requestFactory->createRequest(
            'PATCH',
            sprintf('/time_entries/%s.json', $id)
        );

        $data = ['time_entry' => $data];
        return $this->send($request, $data);
    }

    public function deleteTimeEntry(TimeEntry $timeEntry)
    {
        $request = $this->requestFactory->createRequest(
            'DELETE',
            sprintf('/time_entries/%s.json', $timeEntry->getId())
        );
        return $this->send($request);
    }

    public function readTracker()
    {
        $request = $this->requestFactory->createRequest(
            'GET',
            '/tracker.json'
        );
        return $this->send($request);
    }
    
    public function startTracking(TimeEntry $timeEntry)
    {
        $request = $this->requestFactory->createRequest(
            'PATCH',
            sprintf('/tracker/%s.json', $timeEntry->getId())
        );
        return $this->send($request);
    }

    public function stopTracking($id)
    {
        $request = $this->requestFactory->createRequest(
            'DELETE',
            sprintf('/tracker/%s.json', $id)
        );
        return $this->send($request);
    }

    public function readProject($project_id)
    {
        $request = $this->requestFactory->createRequest(
            'GET',
            sprintf('/projects/%s.json', $project_id)
        );
        return $this->send($request);
    }

    public function readProjects()
    {
        $request = $this->requestFactory->createRequest(
            'GET',
            '/projects.json'
        );
        return $this->send($request);
    }

    public function readService($service_id) {
        $request = $this->requestFactory->createRequest(
            'GET',
            sprintf('/services/%s.json', $service_id)
        );
        return $this->send($request);
    }

    public function readServices()
    {
        $request = $this->requestFactory->createRequest(
            'GET',
            '/services.json'
        );
        return $this->send($request);
    }

    public function readTimeEntry($id)
    {
        $request = $this->requestFactory->createRequest(
            'GET',
            sprintf('/time_entries/%s.json', $id)
        );
        return $this->send($request);
    }
}
