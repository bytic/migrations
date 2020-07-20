<?php

namespace Bytic\Migrations\Tests\Utility\Traits;

use Bytic\Migrations\Tests\AbstractTest;
use Bytic\Migrations\Utility\Helper;

/**
 * Class HasCommandPathTraitTest
 * @package Bytic\Migrations\Tests\Utility\Traits
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