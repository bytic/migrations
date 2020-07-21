<?php

namespace ByTIC\Migrations;

use ByTIC\Migrations\Console\MigrateCommand;
use Nip\Container\ServiceProviders\Providers\AbstractSignatureServiceProvider;

/**
 * Class MigrationsServiceProvider
 * @package ByTIC\Scheduler
 */
class MigrationsServiceProvider extends AbstractSignatureServiceProvider
{
    /**
     * @inheritdoc
     */
    public function register()
    {
        $this->registerMigrator();
    }

    protected function registerMigrator()
    {
        $this->getContainer()->share('migrations.migrator', function () {
            $migrator = $this->getContainer()->get(Migrator::class);
            return $migrator;
        });
    }

    protected function registerCommands()
    {
        $this->commands(
            MigrateCommand::class
        );
    }

    /**
     * @inheritdoc
     */
    public function provides()
    {
        return ['migrations.migrator'];
    }
}
