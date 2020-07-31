<?php

namespace ByTIC\Migrations\Config\Traits;

/**
 * Trait HasParamsTrait
 * @package ByTIC\Migrations\Config\Traits
 */
trait HasParamsTrait
{
    protected $params = null;

    /**
     * @return null
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param null $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @param $params
     */
    public function mergeParams($params)
    {
        $this->params = array_merge($this->params, $params);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->params;
    }

    protected function generateBaseParams()
    {
        $this->params = [
            'paths' => [
                'migrations' => [],
                'seeds' => [],
            ],
            'environments' => [],
        ];
    }
}