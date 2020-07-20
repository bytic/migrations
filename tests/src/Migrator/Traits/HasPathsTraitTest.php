<?php

namespace Bytic\Migrations\Tests\Migrator\Traits;

use Bytic\Migrations\Migrator;
use Bytic\Migrations\Tests\AbstractTest;
use Bytic\Migrations\Utility\Helper;

/**
 * Class HasPathsTraitTest
 * @package Bytic\Migrations\Tests\Migrator\Traits
 */
class HasPathsTraitTest extends AbstractTest
{
    public function test_paths_autodetect()
    {
        $migrator = new Migrator();

        Helper::setBasePath(TEST_FIXTURE_PATH);
        $basePath = TEST_FIXTURE_PATH . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR;

        self::assertSame([$basePath . 'migrations'], $migrator->paths());
        self::assertSame([$basePath . 'migrations'], $migrator->paths('migrations'));
        self::assertSame([$basePath . 'seeds'], $migrator->paths('seeds'));
    }
}
