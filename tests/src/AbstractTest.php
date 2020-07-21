<?php

namespace ByTIC\Migrations\Tests;

use ByTIC\Migrations\Utility\Helper;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest.
 */
abstract class AbstractTest extends TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();

        $path = Helper::normalizePath(Helper::getBasePath(), 'bootstrap', 'cache', 'migrations.php');
        if (file_exists($path)) {
            unlink($path);
        }
        Helper::setBasePath(null);

        $this->addToAssertionCount(
            \Mockery::getContainer()->mockery_getExpectationCount()
        );
        m::close();
    }
}
