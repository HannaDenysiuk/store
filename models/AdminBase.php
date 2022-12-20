<?php
abstract class AdminBase{
    public static function checkAdmin(){
        $userId = User::checkLog();
        $user = User::getUser($userId);
        if($user['role']=='admin'){
            return true;
        }
        
        return false;
    }
}