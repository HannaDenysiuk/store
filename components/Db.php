<?php
class Db
{
    public static function GetConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath); //те що поверне файл а не його підключення
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        return $db;
    }
}
