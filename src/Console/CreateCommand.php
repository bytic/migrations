<?php

namespace ByTIC\Migrations\Console;

use ByTIC\Console\Command;
use Exception;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateCommand
 * @package ByTIC\Migrations\Console
 */
class CreateCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('migrations:create');

        $this->setDescription('Create a new migration')
            ->addArgument('name', InputArgument::OPTIONAL, 'Class name of the migration (in CamelCase)')
            ->setHelp(
                sprintf(
                    '%sCreates a new database migration%s',
                    PHP_EOL,
                    PHP_EOL
                )
            );
    }

    /**
     * @inheritDoc
     * @noinspection PhpMissingParentCallCommonInspection
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $migrator = migrator();
        return $migrator->create($input->getArguments(), $output);
    }
}
