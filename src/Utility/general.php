<?php

use Nip\Container\Container;

if (!function_exists('migrator')) {
    /**
     * @return \Bytic\Migrations\Migrator
     */
    function migrator()
    {
        if (function_exists('app')) {
            return app('migrations.migrator');
        }

        $container = Container::getInstance();
        if ($container->has('migrations.migrator')) {
            return $container->get('migrations.migrator');
        }
        return null;
    }
}
