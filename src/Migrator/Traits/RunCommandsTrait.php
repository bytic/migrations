<?php

namespace ByTIC\Migrations\Migrator\Traits;

use Phinx\Console\PhinxApplication;
use Symfony\Component\Console\Input\ArrayInput;

/**
 * Trait RunCommandsTrait
 * @package ByTIC\Migrations\Migrator\Traits
 */
trait RunCommandsTrait
{
    /**
     * @param $output
     * @return int
     */
    public function migrate($output = null)
    {
        return $this->runCommand('migrate', [], $output);
    }

    /**
     * @param $command
     * @param array $arguments
     * @param $output
     * @return int
     * @noinspection PhpDocMissingThrowsInspection
     */
    protected function runCommand($command, $arguments = [], $output = null)
    {
        $phinx = new PhinxApplication();
        $command = $phinx->find($command);

        $arguments['command'] = $command;
        $arguments['--configuration'] = $this->getCachedConfigPath();

        $input = new ArrayInput($arguments);
        /** @noinspection PhpUnhandledExceptionInspection */
        return $command->run(new ArrayInput($arguments), $output);
    }
}
