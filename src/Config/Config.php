<?php

namespace ByTIC\Migrations\Config;

/**
 * Class Config.
 */
class Config
{
    use Traits\GenerateContentTrait;
    use Traits\HasEnviromentsTrait;
    use Traits\HasParamsTrait;
    use Traits\HasPathsTrait;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->generateBaseParams();
    }

    /**
     * @param array $params
     * @return static
     */
    public static function fromConfig(array $params)
    {
        $config = new static();
        $config->mergeParams($params);

        return $config;
    }
}
