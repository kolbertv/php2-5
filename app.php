<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 22.06.2018
 * Time: 20:28
 */

header("Cache-Control: no-store, no-cache, must-revalidate");
session_start();

require_once 'autoload.php';


try {

    App::init();

}
 catch (PDOException $e) {
    echo "DB is not available";
    var_dump($e->getTrace());
 }

 catch (Exception $e) {
    echo $e->getMessage();
 }


?>