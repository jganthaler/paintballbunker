<?php

namespace Project;


class Settings
{
    const IMPRINT_PAGE_ID = 3;
    const PRIVACY_PAGE_ID = 4;
    const COOKIE_PAGE_ID = 5;

    const CONTACT_FORM_EMAIL = 'info@jganthaler.it';

    protected static $config = [];


    public static function init()
    {
        self::$config = \rex_addon::get('project')->getConfig('project_settings');
    }

    public static function getAll()
    {
        return self::$config;
    }

    public static function getValue($key, $default = '')
    {
        if (self::$config) {
            return array_key_exists($key, self::$config) ? self::$config[$key] : $default;
        }
        return '';
    }

    public static function setValue($key, $value)
    {
        self::$config[$key] = $value;
    }

    public static function save()
    {
        \rex_addon::get('project')->setConfig('project_settings', self::$config);
    }
}