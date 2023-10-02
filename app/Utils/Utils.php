<?php
    
namespace App\Utils;

class Utils
{
    public static function dinamicFilter($filters, $tableColumns, $query)
    {
        foreach ($filters as $column => $value) {
            if (in_array($column, $tableColumns)) {
                if (is_array($value)) {
                    $query->whereIn($column, $value);
                } elseif ($value !== null) {
                    $query->where($column, 'like', "%{$value}%");
                }
            }
        }

        return $query;
    }

    public static function arraySort(array $array): array
    {
        usort($array, function($a, $b) {
            $numberA = (int) basename($a);
            $numberB = (int) basename($b);
            return $numberA - $numberB;
        });
        return $array;
    }
}
