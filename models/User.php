<?php

class User
{

    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $role = '';
        $query = "INSERT INTO user(name, email, password, role) "
            . "VALUES (:name, :email, :password, :role)";
        $result = $db->prepare($query);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function checkName($name)
    {
        if (strlen($name) >= 2)
            return true;
        return false;
    }
    public static function checkEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function checkPassword($pwd)
    {
        if (strlen($pwd) > 4)
            return true;
        return false;
    }
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $query = "SELECT COUNT(*) FROM user WHERE email = :email";

        $result = $db->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;

        return false;
    }
    public static function checkUserData($email, $pwd)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM user WHERE email = :email AND password = :password";
        $result = $db->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $pwd, PDO::PARAM_STR);
        $result->execute();
        $u = $result->fetch(PDO::FETCH_ASSOC);
        if ($u)
            return $u['id'];

        return false;
    }
    public static function login($id)
    {
        //session_start(); //винесли в початковий файл
        $_SESSION['user'] = $id;
        return true;
    }
    public static function isNOTGest()
    {
        if (!isset($_SESSION['user']))
            return false;
        return $_SESSION['user'];
    }
    public static function getUser($id)
    {

        $db = Db::getConnection();

        $query = "SELECT * FROM user WHERE id = :id";
        $result = $db->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);

        return false;
    }
    public static function checkLog()
    {
        // session_start(); //винесли в початковий файл
        if (isset($_SESSION['user']))
            return $_SESSION['user'];
        else
            header("location: /user/login");
    }
    public static function logout()
    {
        $_SESSION = array();
        session_destroy();
    }

    public static function  isSessionSet()
    {
        if (isset($_SESSION['user']))
            return $_SESSION['user'];
        else
            return false;
    }
    public static function editUser($id, $name, $pwd)
    {
        $db = Db::getConnection();

        $query = "UPDATE user SET name = :name, password = :password WHERE id = :id";
        $result = $db->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $pwd, PDO::PARAM_STR);

        return $result->execute();
    }
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }
}
