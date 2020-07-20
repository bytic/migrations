<?php

namespace Bytic\Migrations\Tests\Migrator\Traits;

use Bytic\Migrations\Migrator;
use Bytic\Migrations\Tests\AbstractTest;
use Bytic\Migrations\Utility\Helper;
use Mockery\Mock;

/**
 * Class RunCommandsTraitTest
 * @package Bytic\Migrations\Tests\Migrator\Traits
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
