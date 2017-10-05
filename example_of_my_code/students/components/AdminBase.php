<?php
/**
 * Created by PhpStorm.
 * User: Khozh
 * Date: 03.10.2017
 * Time: 19:55
 */

abstract class AdminBase
{
    public function checkAdmin()
    {
        //проверяем авторизирован ли пользователь, если нет - переадресован
        $userId = User::checkLogged();
        //получаем пользователя из базы данных по ID
        $user = User::getUserById($userId);

        //если пользователь админ - продолжаем
        if($user['role'] == 'admin'){
            return true;
        }

        die('Access denied');
    }
}