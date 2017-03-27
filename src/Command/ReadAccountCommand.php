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
 * Contains lrackwitz\mite\Command\ReadAccountCommand.php.
 */
namespace lrackwitz\mite\Command;

use GuzzleHttp\Psr7\Request;
use lrackwitz\mite\Entities\Resource\ResourceBuilderInterface;
use lrackwitz\mite\Service\AccountResourceBuilder;
use lrackwitz\mite\Service\MiteClient;
use lrackwitz\mite\Service\ResourceDirector;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ReadAccountCommand.
 *
 * @package lrackwitz\mite\Command
 */
class ReadAccountCommand extends Command
{
    /**
     * The mite client.
     *
     * @var MiteClient
     */
    private $client;

    /**
     * The resource director.
     *
     * @var ResourceDirector
     */
    private $director;

    /**
     * The resource builder.
     *
     * @var ResourceBuilderInterface
     */
    private $builder;

    /**
     * The request.
     *
     * @var Request
     */
    private $request;

    public function __construct(
        MiteClient $client,
        ResourceDirector $director,
        ResourceBuilderInterface $builder,
        Request $request
    ) {
        $this->client = $client;
        $this->director = $director;
        $this->builder = $builder;
        $this->request = $request;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('account:read')
            ->setDescription('Returns the account information.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $response = $this->client->send($this->request);
        if ($response) {
            $data = json_decode($response->getBody()->getContents(), true);

            $account = $this->director->build(
                $this->builder,
                array_shift($data)
            );

            $output->writeln($account->__toString());
        }
    }
}
