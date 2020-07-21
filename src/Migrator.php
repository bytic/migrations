<?php

namespace ByTIC\Migrations;

/**
 * Class Migrator
 * @package ByTIC\Migrations
 */
class Migrator
{
    use Migrator\Traits\HasConfigTrait;
    use Migrator\Traits\HasEnviromentsTrait;
    use Migrator\Traits\HasPathsTrait;
    use Migrator\Traits\RunCommandsTrait;
}
