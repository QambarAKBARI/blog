<?php

namespace App\Service;

abstract class Session
{
    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return [type]
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;

        return $_SESSION[$key];
    }

    /**
     * @param mixed $key
     *
     * @return [type]
     */
    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * @param mixed $key
     *
     * @return [type]
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * @return [type]
     */
    public static function invalidate()
    {
        session_destroy();
        session_start();
    }
}
