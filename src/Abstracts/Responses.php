<?php

namespace Vook\Fitbank\Abstracts;

use Carbon\Carbon;

/**
 * Class Responses
 * @package Vook\Fitbank\Abstracts
 */
abstract class Responses
{
    /**
     * @param $model
     * @return mixed
     */
    public static function hydrate($model)
    {
        if (is_string($model)) {
            $model = json_decode($model);
        }
        $childName = get_called_class();
        $instance = new $childName();
        foreach ($model as $item => $value) {
            if (preg_match('/\d{4}(\-\d{2}){2}T(\d{2}\:?){3}/', $value)) {
                $value = new Carbon($value);
            }
            $instance->{lcfirst($item)} = $value;
        }
        return $instance;
    }
}
