<?php

namespace Bytic\Migrations\Utility;

/**
 * Class Helper
 * @package Bytic\Migrations\Utility
 */
class Helper
{
    use Traits\HasBasePathTrait;
    use Traits\HasCommandPathTrait;

    /**
     * @param mixed ...$parts
     * @return string
     */
    public static function normalizePath(...$parts)
    {
        $path = '';

        if (is_array($parts[0]) && count($parts[0]) > 1) {
            $parts = $parts[0];
        }
        if (is_string($parts[0])) {
            $path = $parts[0];
        }
        if (count($parts) > 1) {
            $path = implode(DIRECTORY_SEPARATOR, $parts);
        }

        return $path;
    }
}
