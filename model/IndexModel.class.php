<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 24.06.2018
 * Time: 18:55
 */

class IndexModel extends Model
{
    public $view = 'index';
    public $title;

    public function index($data=NULL, $deep = 0)
    {

        $result['top_product'] = Product::TopProduct();

        return $result;


    }

}


?>