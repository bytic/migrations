<?php

namespace Bytic\Migrations;

/**
 * Class Migrator
 * @package Bytic\Migrations
 */
class Migrator
{
    use Migrator\Traits\HasConfigTrait;
    use Migrator\Traits\HasEnviromentsTrait;
    use Migrator\Traits\HasPathsTrait;
    use Migrator\Traits\RunCommandsTrait;
}
