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
 * Contains lrackwitz\mite\Command\DeleteTimeEntryCommand.php.
 */

namespace lrackwitz\mite\Command;

use GuzzleHttp\Psr7\Request;
use lrackwitz\mite\Entities\Resource\TimeEntry;
use lrackwitz\mite\Service\MiteClient;
use lrackwitz\mite\Service\RequestFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DeleteTimeEntryCommand.
 *
 * @package lrackwitz\mite\Command
 */
class DeleteTimeEntryCommand extends Command
{
    /**
     * The mite client.
     *
     * @var MiteClient
     */
    private $client;

    /**
     * The request factory.
     *
     * @var RequestFactory
     */
    private $factory;

    public function __construct(
        MiteClient $client,
        RequestFactory $factory
    ) {
        $this->client = $client;
        $this->factory = $factory;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('time_entry:delete')
            ->setDescription('Deletes a time entry by id.')
            ->setAliases(['delete'])
            ->addArgument(
                'id',
                InputArgument::REQUIRED,
                'The id of the time entry to delete.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $response = $this->client->deleteTimeEntry(new TimeEntry($id));

        $output->writeln($response->getBody()->getContents());
    }
}
