<?php

namespace ByTIC\Migrations\Tests\Console;

use ByTIC\Migrations\Console\MigrateCommand;
use ByTIC\Migrations\Migrator;
use Nip\Container\Container;
use ByTIC\Migrations\Tests\AbstractTest;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class CacheCommandTest
 * @package ByTIC\Migrations\Tests\Console
 */
class MigrateCommandTest extends AbstractTest
{
    public function test_handle()
    {
        $migrator = \Mockery::mock(Migrator::class);
        $migrator->shouldReceive('migrate')->once()->andReturn(0);

        Container::getInstance()->set('migrations.migrator', $migrator);

        $applicationConsole = new \Symfony\Component\Console\Application();
        $applicationConsole->add(new MigrateCommand());
        $command = $applicationConsole->get('migrations:migrate');

        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $output = $commandTester->getDisplay();
//        static::assertStringContainsString('Routes  cached successfully!', $output);
    }
}
