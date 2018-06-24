<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 23.06.2018
 * Time: 21:36
 */

class App
{
    public static function Init()
    {
        date_default_timezone_set('Europe/Moscow'); //временная зона по умолчанию

        db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web(isset($_GET['path']) ? $_GET['path'] : '');
        }
    }

    protected static function web($url)
    {

        $url = explode('/', $url); //разбиваем строку

//        Debug::Deb($url);

//    print_r($url);
//    echo "<br>";

        if (!empty($url[0])) {
            $_GET['page'] = $url[0];
            if (!empty($url[1])) {
                if (is_numeric($url[1])) {
                    $_GET['id'] = $url[1];
                    $_GET['action'] = $url[0];
                } else {
                    $_GET['action'] = $url[1];
                }
                if (isset($url[2])) {
                    $_GET['id'] = $url['2'];
                }
            }
        } else {
            $_GET['page'] = 'index';
        }

        if (isset($_GET['page']))
        {
            $controllerName = $_GET['page'] . 'Controller';
            $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';
            $controller = new $controllerName();
            $controller->$methodName();
        }

//        print_r($_GET);

    }


}


?>