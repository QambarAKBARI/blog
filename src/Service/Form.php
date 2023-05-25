<?php

namespace App\Service;

abstract class Form
{
    private static $filters = [
        'text' => FILTER_SANITIZE_SPECIAL_CHARS,
        'email' => FILTER_VALIDATE_EMAIL,
        'int' => FILTER_VALIDATE_INT,
        'float' => FILTER_VALIDATE_FLOAT,
        'default' => FILTER_DEFAULT,
    ];

    public static function isSubmitted()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public static function getData($field, $type = 'default')
    {
        return filter_input(INPUT_POST, $field, self::$filters[$type]);
    }
}
