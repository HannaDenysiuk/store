<?php
class CabinetController
{

    public function actionIndex()
    {
        $id = User::checkLog();
        $user = User::getUser($id);
        $errors = false;
        if ($user == false) {
            $errors[] = "данные - не корректны";
        } else {
            $is_session_set = User::isSessionSet();
            require_once(ROOT . '/views/cabinet/index.php');
        }
        //перевіряти чи пускати користувача в кабінет  = чи є сесія? якщо ні - перенаправити на логін

        return true;
    }
    public function actionEdit()
    {
        $result = false;
        $id = User::checkLog();
        $user = User::getUser($id);
        $name = $user['name'];
        $pwd = $user['password'];
        $errors = false;
        if (isset($_POST['submit'])) {
            if (isset($_POST['name']))
                $name = $_POST['name'];
            if (isset($_POST['password']))
                $pwd = $_POST['password'];

            $errors = false;

            if (!User::checkName($name))
                $errors[] = "Имя должно быть не короче чем 2 символа";
            if (!User::checkPassword($pwd))
                $errors[] = "пароль должен быть не короче чем 5 символов";

            if ($errors == false) {
                $result = User::editUser($id, $name, $pwd);
                header("location: /user/login");
            }
        }
        $is_session_set = User::isSessionSet();
        require_once(ROOT . '/views/cabinet/edit.php');


        return true;
    }
}
