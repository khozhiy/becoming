<?php
/**
 * Created by PhpStorm.
 * User: Khozh
 * Date: 05.10.2017
 * Time: 17:04
 */

class MyValidation
{


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
        if ($gender = 'Мужской' || $gender = 'Женский') {
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
        if (strlen($year_birth) != 4 || $year_birth > 2017 ||$year_birth <= 1990 || !$year_birth) {
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

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

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
        if ($local_in_town = 'Местный' || $local_in_town = 'Приезжий') {
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