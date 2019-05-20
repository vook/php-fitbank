<?php

namespace Vook\Fitbank\Abstracts;

/**
 * Class Responses
 * @package Vook\Fitbank\Abstracts
 */
abstract class Responses
{
    /**
     * @param array $model
     * @return $this
     */
    public static function hydrate(array $model)
    {
        $childName = get_called_class();
        $instance = new $childName();
        foreach ($model as $item => $value) {
            $instance->{lcfirst($item)} = $value;
        }
        return $instance;
    }
}
