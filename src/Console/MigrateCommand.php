<?php

declare(strict_types=1);

namespace ByTIC\Migrations\Console;

use ByTIC\Console\Command;
use Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class MigrateCommand
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
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $migrator = migrator();
        return $migrator->migrate($input->getArguments(), $output);
    }
}
