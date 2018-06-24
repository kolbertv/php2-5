<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 24.06.2018
 * Time: 15:07
 */


class IndexController extends Controller
{
    public $view = 'index';

    public function index()
    {

        $this->view .= "/" . __FUNCTION__ . '.php';

        echo $this->controller_view();


    }

}


?>