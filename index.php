<?php
//MVC - model view controller 
//front controller


// 21-11-2013
//рік 2013, місяць 11, день 21
// $string ="21-11-2013";
// $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
// $replacment = "year $3, mont1h $2, day $";
// $res = preg_replace($pattern, $replacment, $string);

// echo $res;

// $str = "PHP is prog asd 123 asdasd";
// $pattern  = '/PHP/';
// $res =  preg_match($pattern, $str);
// echo $res;

//die; ///вийдемо на цьому рядочку



// 1. Загальні налаштування
ini_set('display_errors',1);    //1 - видно помилки 0 - ні
error_reporting(E_ALL);   //all warnings and error
session_start();



// 2. Підключення файлів системи
define('ROOT',dirname(__FILE__));   //create const
require_once(ROOT . '/components/Autoload.php');   //connect


//require_once(ROOT . '/components/Router.php');   //connect
//require_once(ROOT .'/components/Db.php');//includde class Db






// 4. Виклик роутер
$router = new Router();
$router->run();




