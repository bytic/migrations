<?php

namespace Bytic\Migrations\Tests;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Class CommandTest.
 */
class CommandTest extends AbstractTest
{
    public function test_runPhinx()
    {
        $process = new Process([PROJECT_BASE_PATH.'/vendor/bin/phinx', 'migrate']);
        $process->setWorkingDirectory(TEST_FIXTURE_PATH);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output = $process->getOutput();

        self::assertStringContainsString('Phinx by CakePHP', $output);
        self::assertStringContainsString('All Done. Took', $output);
    }
}
