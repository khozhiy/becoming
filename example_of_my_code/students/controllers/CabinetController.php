<?php
/**
 * Created by PhpStorm.
 * User: Khozh
 * Date: 03.10.2017
 * Time: 22:55
 */

class CabinetController
{
    /**
     * @return bool
     */
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        $name = $user['name'];
        $surname = $user['surname'];
        $gender = $user['gender'];
        $number_groop = $user['number_groop'];
        $email = $user['email'];
        $number_balls = $user['number_balls'];
        $year_birth = $user['year_birth'];
        $local_in_town = $user['local_in_town'];
        $password = $user['password'];


        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $gender = $_POST['gender'];
            $number_groop = $_POST['number_groop'];
            $email = $_POST['email'];
            $number_balls = $_POST['number_balls'];
            $year_birth = $_POST['year_birth'];
            $local_in_town = $_POST['local_in_town'];
            $password = $_POST['password'];

            $errors = false;

            $errors = MyValidation::Valid($name, $surname, $gender, $number_groop, $email,
                $number_balls, $year_birth, $local_in_town, $password, $user);

            if ($errors == false) {
                $result = User::edit($userId, $name, $surname, $gender, $number_groop, $email,
                    $number_balls, $year_birth, $local_in_town, $password);
            }
        }

        require_once(ROOT . '/views/cabinet/index.php');

        return true;
    }
}