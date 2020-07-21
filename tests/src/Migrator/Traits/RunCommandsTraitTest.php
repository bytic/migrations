<?php

namespace ByTIC\Migrations\Tests\Migrator\Traits;

use ByTIC\Migrations\Migrator;
use ByTIC\Migrations\Tests\AbstractTest;
use ByTIC\Migrations\Utility\Helper;
use Mockery\Mock;

/**
 * Class RunCommandsTraitTest
 * @package ByTIC\Migrations\Tests\Migrator\Traits
 */
class RunCommandsTraitTest extends AbstractTest
{
    public function test_migrate()
    {
        /** @var Migrator|Mock $migrator */
        $migrator = \Mockery::mock(Migrator::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $migrator->shouldReceive('runCommand')->with('migrate',[], null)->once()->andReturn(true);

        self::assertSame(true, $migrator->migrate());
    }
}
