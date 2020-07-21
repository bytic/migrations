<?php

namespace ByTIC\Migrations\Config;

/**
 * Class Config.
 */
class Config
{
    use Traits\GenerateContentTrait;
    use Traits\HasEnviromentsTrait;
    use Traits\HasPathsTrait;

    protected $params;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->params = [
            'paths' => [
                'migrations' => [],
                'seeds'      => [],
            ],
            'environments' => [],
        ];
    }

    /**
     * @return static
     */
    public static function fromConfig()
    {
        $config = new static();

        return $config;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->params;
    }
}
