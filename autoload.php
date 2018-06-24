<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 22.06.2018
 * Time: 20:59
 */

require_once 'lib/twig/autoload.php';

spl_autoload_register('gbStandartAutoload');

function gbStandartAutoload($className){

    //Папкм с классами загрузки

    $dirs = [
        'controller',
        'lib',
        'model/'
    ];

    $found = false;

    //Имя файла формируется из имени класс и '.class.php'

    foreach ($dirs as $dir) {
        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.class.php';

        if (is_file($fileName)){
            require_once ($fileName);
            $found = true;
        }

    }

    if (!$found){
        header("Location: /page404/");
      //  throw new Exception('Нет файла класс для загрузки: ' . $className . $fileName);
    }

    return true;

}

?>