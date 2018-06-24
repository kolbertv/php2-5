<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 24.06.2018
 * Time: 11:19
 */

class Config
{
    private static $configCache = [];

    public static function get($parameter)
    {
        if (!isset(self::getConfig()[$parameter])) {
            throw new Exception('Parameter' . $parameter . 'does not exist');
        }

        return self::getConfig()[$parameter];
    }

    private static function getConfig()
    {

        if (empty(self::$configCache)) {
            $configDir = __DIR__ . '/../config/';
            $configDefault = $configDir . 'config.default.php';

            if (is_file($configDefault)) {
                require_once $configDefault;
            } else {
                throw new Exception('Не найден файл конфигурации');
            }

            if (!isset($config) || !is_array($config)) {
                throw new Exception('Не загружается файл конфигурации');
            }

            self::$configCache = $config;
        }

        return self::$configCache;
    }

}


?>