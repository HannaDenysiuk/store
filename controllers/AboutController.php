<?php

class AboutController{
    public function actionIndex(){
        $is_session_set = User::isSessionSet();
        require_once(ROOT . "/views/site/about.php");
        return true;
    }
}