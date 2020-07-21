<?php

namespace ByTIC\Migrations\Tests\Utility\Traits;

use ByTIC\Migrations\Tests\AbstractTest;
use ByTIC\Migrations\Utility\Helper;

/**
 * Class HasCommandPathTraitTest
 * @package ByTIC\Migrations\Tests\Utility\Traits
 */
class HasCommandPathTraitTest extends AbstractTest
{
    public function test_getCommandPath()
    {
        self::assertSame(
            Helper::normalizePath(PROJECT_BASE_PATH, 'vendor', 'bin', 'phinx'),
            Helper::getCommandPath()
        );
    }
}
