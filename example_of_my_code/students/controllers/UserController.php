<?php
/**
 * Created by PhpStorm.
 * User: Khozh
 * Date: 03.10.2017
 * Time: 20:23
 */

class UserController
{
    /**
     * @return bool
     */
    public function actionRegister()
    {
        $name = '';
        $surname = '';
        $gender = '';
        $number_groop = '';
        $email = '';
        $number_balls = '';
        $year_birth = '';
        $local_in_town = '';
        $password = '';

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

            if (MyValidation::checkYear_birth($year_birth)) {
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
                $result = User::register($name, $surname, $gender, $number_groop,  $email,
                    $number_balls, $year_birth, $local_in_town, $password);
                //Запоминаем пользователя (сессия)
                $userId = User::checkUserData($email, $password);
                User::auth($userId);
                header("Location: /cabinet/");
            }
        }
        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    /**
     * @return bool
     */
    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet/");
            }
            // Валидация полей
            if (!MyValidation::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!MyValidation::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }
}