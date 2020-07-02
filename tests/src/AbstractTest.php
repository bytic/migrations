<?php

namespace Bytic\Migrations\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest
 * @package Bytic\Migrations\Tests
 */
abstract class AbstractTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        \Nip\Container\Container::setInstance(new \Nip\Container\Container());
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->addToAssertionCount(
            \Mockery::getContainer()->mockery_getExpectationCount()
        );
        m::close();
    }
}
