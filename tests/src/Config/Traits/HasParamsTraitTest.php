<?php

namespace ByTIC\Migrations\Tests\Config\Traits;

use ByTIC\Migrations\Config\Config;
use ByTIC\Migrations\Tests\AbstractTest;

/**
 * Class HasParamsTraitTest
 * @package ByTIC\Migrations\Tests\Config\Traits
 */
class HasParamsTraitTest extends AbstractTest
{
    public function test_mergeParams()
    {
        $config = new Config();

        $configParams = @require PROJECT_BASE_PATH . '/config/migrations.php';
        $config->mergeParams($configParams);

        $params = $config->toArray();
        self::assertCount(8, $params['environments']['local']);
    }
}
