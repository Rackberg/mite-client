#A mite client for your console

A console based mite client.

> Please note that this software is still under heavy development and
can change anytime you do a `composer update`.

Installation
------------
- Download [Composer](https://getcomposer.org/download/): `curl -sS https://getcomposer.org/composer.phar -o composer.phar`
- Install: `php composer.phar require global lrackwitz/mite`

Configuration
-------------
Execute `mite list` and follow the instructions.

You need to have a registered mite account.
Go to `https://<your account name>.mite.yo.lk/myself` to get your personal mite API key.

Example of the config.yml to create:
    
    parameters:
        mite.account_name: Your account name goes here
        mite.api_key: Your api key goes here

Usage
-----
- To see all available commands: `mite list`
- To add a time entry: `mite create [options]`
- To edit a time entry: `mite edit <id> [options]`
- To delete a time entry: `mite delete <id>`
- To start the tracker for a time entry: `mite start <id>`
- To stop the tracker for a time entry: `mite stop <id>`
- To show a list of time entries: `mite times [options]`
- To get information about your account: `mite account:read`
- To get information about the logged in user: `mite account:myself`

Author
------
Lars Rackwitz-Rosenberg - <rackwitz.lars@gmail.com>

License
-------
This mite client is licensed under the GPLv3 License - see the LICENSE file for details.

