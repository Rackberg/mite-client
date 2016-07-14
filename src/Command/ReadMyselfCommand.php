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
 * Contains lrackwitz\mite\Command\ReadMyselfCommand.php.
 */
namespace lrackwitz\mite\Command;

use GuzzleHttp\Psr7\Request;
use lrackwitz\mite\Service\MiteClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ReadMyselfCommand.
 *
 * @package lrackwitz\mite\Command
 */
class ReadMyselfCommand extends Command
{
    /**
     * The mite client.
     *
     * @var MiteClient
     */
    private $client;

    /**
     * The request.
     *
     * @var Request
     */
    private $request;

    public function __construct(
        MiteClient $client,
        Request $request
    ) {
        $this->client = $client;
        $this->request = $request;

        parent::__construct();
    }

    protected function configure()
    {
        $this
          ->setName('account:myself')
          ->setDescription('Returns information about my logged in user.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->client->send($this->request);
        
        $output->writeln($response->getBody()->getContents());
    }
}
