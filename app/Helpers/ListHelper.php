<?php


namespace App\Helpers;


use App\Model\Group;

class ListHelper
{
    public static function get($class, $field) {
        return $class::select('id', $field)
            ->get()
            ->pluck($field, 'id');
    }
}
