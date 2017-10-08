<?php
/**
 * Created by PhpStorm.
 * User: Khozh
 * Date: 05.10.2017
 * Time: 17:04
 */

class MyValidation
{
    public static function Valid($name, $surname, $gender, $number_groop, $email,
                                 $number_balls, $year_birth, $local_in_town, $password, $user)
    {
        $errors = array();
        if (MyValidation::checkName($name) == false) {
            $errors[] = 'Имя не должно быть короче 2-х или длиннее 200 символов';
        };

        if (MyValidation::checkSurname($surname) == false) {
            $errors[] = 'Фамилия не должна быть короче 2-х или длиннее 200 символов';
        };

        if (!MyValidation::checkGender($gender)) {
            $errors[] = "В поле 'Пол' неверная информация. Доступно: Мужской/Женский";
        };

        if (MyValidation::checkNumber_groop($number_groop)) {
            $errors[] = 'Количество цифр группы должно быть равно 4 или введены неверные данные';
        };

        if (MyValidation::checkNumber_balls($number_balls)) {
            $errors[] = 'Количество цифр баллов ВНО должно быть = 3 и в диапазоне(100-200)';
        };

        if (MyValidation::checkYear_birth($year_birth)) {
            $errors[] = 'Год рождения не может быть менее 1990-го и более 2017 или введены неверные данные';
        };

        if (!MyValidation::checkEmail($email)) {
            $errors[] = 'Неправильный email';
        };

        if (MyValidation::checkEmailExists($email) && $email != $user['email']) {
            $errors[] = 'Такой email уже используется';
        };

        if (!MyValidation::checkLocal($local_in_town)) {
            $errors[] = "В поле 'Местный/Приезжий' неверная информация. Доступно: Местный/Приезжий";
        };

        if (!MyValidation::checkPassword($password)) {
            $errors[] = 'Пароль должен быть более 6-и символов';
        };

        return $errors;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2 && strlen($name) < 200) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkSurname($surname)
    {
        if (strlen($surname) >= 2 && strlen($surname) < 200) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkGender($gender)
    {
        if ($gender == 'Мужской' || $gender == 'Женский') {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkNumber_groop($number_balls)
    {
        if (strlen($number_balls) != 4 || !$number_balls) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkNumber_balls($number_balls)
    {
        if (strlen($number_balls) < 3 || !$number_balls || $number_balls < 100 || $number_balls > 200) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkYear_birth($year_birth)
    {
        if (strlen($year_birth) != 4 || $year_birth > 2017 || $year_birth <= 1990 || !$year_birth) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет есть ли в БД такой же email
     */
    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM students WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkLocal($local_in_town)
    {
        if ($local_in_town == 'Местный' || $local_in_town == 'Приезжий') {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
}