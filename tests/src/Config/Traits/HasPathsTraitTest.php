<?php

namespace ByTIC\Migrations\Tests\Config\Traits;

use ByTIC\Migrations\Config\Config;
use ByTIC\Migrations\Tests\AbstractTest;

/**
 * Class HasPathsTraitTest
 * @package ByTIC\Migrations\Tests\Config\Traits
 */
class HasPathsTraitTest extends AbstractTest
{

    public function test_path_convertToArray()
    {
        $config = new Config();

        $config->setParams(['paths' => ['migrations' => 'TEST']]);
        self::assertSame('TEST', $config->paths());

        $config->path('TEST2');
        self::assertSame(['TEST','TEST2'], $config->paths());
    }

}