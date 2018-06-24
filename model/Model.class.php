<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 24.06.2018
 * Time: 18:46
 */

class Model
{
    public $view = 'index';
    public $title;

    function __construct()
    {
        $this->title = Config::get('sitename');
    }

    public function index($data)
    {

    }

    public function __call($methodName, $args)
    {
        // TODO: Implement __call() method.

        header("Location: Config::get('domain')/page404/");
    }
}

?>