<?php

namespace Bytic\Migrations\Console;

use ByTIC\Console\Command;
use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class PublishCommand
 * @package ByTIC\Migrations\Console
 */
class MigrateCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migrations:migrate');
    }

    /**
     * @inheritDoc
     * @noinspection PhpMissingParentCallCommonInspection
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $scheduler = migrator();
        return $scheduler->migrate($output);
    }
}
