<?php
class UserController extends AdminBase
{
    public function actionLogin()
    {
        $errors = false;
        $result = false;
        $pwd = "";
        $email = "";
        if (isset($_POST['submit'])) {
            $pwd = $_POST['password'];
            $email = $_POST['email'];
            $is_exis = User::checkUserData($email, $pwd);


            if ($is_exis == false) {
                $errors[] = "данные - не корректны";
            } else {
                User::login($is_exis);
                if (self::checkAdmin()) {

                    header("location: /admin");
                } else
                    header("location: /cabinet");
            }
        }
        $is_session_set = User::isSessionSet();
        require_once(ROOT . '/views/user/login.php');
        return true;
    }
    public function actionLogout()
    {
        User::logout();
        $is_session_set = User::isSessionSet();
        require_once(ROOT . '/views/user/login.php');

        return true;
    }
    public function actionRegister()
    {
        $name = "";
        $email = "";
        $result = false;

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $pwd = $_POST['password'];

            $errors = false;

            if (!User::checkName($name))
                $errors[] = "Имя должно быть не короче чем 2 символа";
            if (!User::checkEmail($email))
                $errors[] = "email - не корректный";
            if (!User::checkPassword($pwd))
                $errors[] = "пароль должен быть не короче чем 5 символов";
            if (User::checkEmailExists($email))
                $errors[] = "такой email уже используеться";

            if ($errors == false) {
                $result = User::register($name, $email, $pwd);
                header("location: /user/login");
            }
        }
        $is_session_set = User::isSessionSet();
        require_once(ROOT . '/views/user/register.php');

        return true;
    }
}
