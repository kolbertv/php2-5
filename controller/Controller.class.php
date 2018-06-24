<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 24.06.2018
 * Time: 15:45
 */

class Controller
{
    public $view = 'index';
    protected $data;
    protected $template;

    function __construct()
    {
        $this->data = [
            'domain' => Config::get('domain'),
//            'BreadCrumbs' => Bread::BreadCrumbs(explode("/", $_SERVER['REQUEST_URI'])), //будущие хоебные крошки
//            'isAuth' => Auth::logIn(), //будущаая авторизация
        ];
    }

    public function controller_view($param = 0)
    {
        $modelName = $_GET['page'] . 'Model';
        $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';
        $model = new $modelName();
        $content_data = $model->$methodName($param);

        $this->data['title'] = $model->title;
        $this->data['content_data'] = $content_data;

        $loader = new Twig_Loader_Filesystem(Config::get('path_templates'));
        $twig = new Twig_Environment($loader);
        $template = $twig->LoadTemplate($this->view);

        return $template->render($this->data);
    }

    public function __call($name, $param)
    {
        // TODO: Implement __call() method.
        header("Location: /page404/");
    }

}

?>