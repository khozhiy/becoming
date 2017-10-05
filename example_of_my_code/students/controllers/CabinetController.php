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
            $number_balls = $_POST['number_balls'];
            $year_birth = $_POST['year_birth'];
            $local_in_town = $_POST['local_in_town'];
            $password = $_POST['password'];

            $errors = false;

            if (!MyValidation::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х или длиннее 200 символов';
            }

            if (!MyValidation::checkSurname($surname)) {
                $errors[] = 'Фамилия не должна быть короче 2-х или длиннее 200 символов';
            }

            if (!MyValidation::checkGender($gender)) {
                $errors[] = "В поле 'Пол' неверная инфорамация. Доступно: Мужской/Женский";
            }

            if (MyValidation::checkNumber_groop($number_groop)) {
                $errors[] = 'Количество цифр группы должно быть равно 4 или введены неверные данные';
            }

            if (MyValidation::checkNumber_balls($number_balls)) {
                $errors[] = 'Количество цифр баллов ВНО должно быть = 3 и в диапазоне(100-200)';
            }

            if (!MyValidation::checkYear_birth($year_birth)) {
                $errors[] = 'Год рождения не может быть менее 1990-го и более 2017 или введены неверные данные';
            }

            if (!MyValidation::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (MyValidation::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if (!MyValidation::checkLocal($local_in_town)) {
                $errors[] = "В поле 'Местный/Приезжий' неверная информация. Доступно: Местный/Приезжий";
            }

            if (!MyValidation::checkPassword($password)) {
                $errors[] = 'Пароль должен быть более 6-и символов';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $surname, $gender, $number_groop,
                    $number_balls, $year_birth, $local_in_town, $password);
            }
        }

        require_once(ROOT . '/views/cabinet/index.php');

        return true;
    }
}