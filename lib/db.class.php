<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 23.06.2018
 * Time: 22:27
 */

class db
{

    private static $_instance = null;

    private $db; //ресурс работы с БД

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new db(); //создается обэект класса db
        }
        return self::$_instance;
    }

    private function __construct()
    {
    }

    private function __sleep()
    {
        // TODO: Implement __sleep() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function Connect($user, $password, $base, $host = 'localhost', $port = 3306) //соединение с базой
    {
        $connectString = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $base . ';charset=UTF8;';
        $this->db = new PDO($connectString, $user, $password,
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    /*
     * Выполнить запрос к БД
     *
     * Шаблоны SQL запроса
	 * select * from users where id_user = 1 and age > 25;
	 * select * from users where id_user = ? and age > ?;
	 * select * from users where id_user = :id_user and age > :age;
     *
     * Массив данных для шаблона SQL
	 * $params =
			 [
			 	'id_user' => 1,
				'age' => 25
			 ]
     */

    // запрос в базу

    public function Query($query, $params = array())
    {
        $res = $this->db->prepare($query);
        $res->execute($params);
        return $res;
    }

    // выполнить запрос с выборкой данных
    public function Select($query, $params = array())
    {
        $result = $this->Query($query, $params);
        if ($result) {
            return $result->fetchAll();
        }
    }

    //Выполнить запрос с выборкой данных для одной строки

    public function SelectRow($query, $params = array())
    {
        $result = $this->Query($query, $params);
        if ($result) {
            return $result->fetchAll[0];
        }
    }


}

?>