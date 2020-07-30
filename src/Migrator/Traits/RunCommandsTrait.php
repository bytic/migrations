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
     * @param array $arguments
     * @param $output
     * @return int
     */
    public function migrate($arguments = [], $output = null)
    {
        return $this->runCommand('migrate', $arguments, $output);
    }

    /**
     * @param array $arguments
     * @param $output
     * @return int
     */
    public function create($arguments = [], $output = null)
    {
        return $this->runCommand('create', $arguments, $output);
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

        var_dump($arguments);die();

        $arguments['command'] = $command;
        $arguments['--configuration'] = $this->getCachedConfigPath();

        $input = new ArrayInput($arguments);
        /** @noinspection PhpUnhandledExceptionInspection */
        return $command->run(new ArrayInput($arguments), $output);
    }
}
