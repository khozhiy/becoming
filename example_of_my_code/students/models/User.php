<?php
/**
 * Created by PhpStorm.
 * User: Khozh
 * Date: 03.10.2017
 * Time: 19:55
 */

class User
{

    /**
     * Регистрация пользователя
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    public static function register($name, $surname, $gender, $number_groop, $email,
                                    $number_balls, $year_birth, $local_in_town, $password)
    {

        $db = Db::getConnection();

        $sql = "INSERT INTO students (name, surname, gender, number_groop, email, number_balls, year_birth, local_in_town, password) "
            . 'VALUES (:name, :surname, :gender, :number_groop, :email, :number_balls, :year_birth, :local_in_town, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':gender', $gender, PDO::PARAM_STR);
        $result->bindParam(':number_groop', $number_groop, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':number_balls', $number_balls, PDO::PARAM_INT);
        $result->bindParam(':year_birth', $year_birth, PDO::PARAM_INT);
        $result->bindParam(':local_in_town', $local_in_town, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    /**
     * Returns user by id
     * @param integer $id
     */
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM students WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }

    /**
     * Запоминаем пользователя
     * @param string $email
     * @param string $password
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email
     * @param string $password
     * @return mixed : ingeger user id or false
     */
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM students WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    /**
     * Редактирование данных пользователя
     * @param string $name
     * @param string $password
     */
    public static function edit($userId, $name, $surname, $gender, $number_groop,
                                         $number_balls, $year_birth, $local_in_town, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE students 
            SET name = :name, password = :password, surname = :surname, gender = :gender, number_groop = :number_groop, "
            . "number_balls = :number_balls, year_birth = :year_birth, local_in_town = :local_in_town, "
            . "password = :password
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':gender', $gender, PDO::PARAM_STR);
        $result->bindParam(':number_groop', $number_groop, PDO::PARAM_INT);
        $result->bindParam(':number_balls', $number_balls, PDO::PARAM_INT);
        $result->bindParam(':year_birth', $year_birth, PDO::PARAM_INT);
        $result->bindParam(':local_in_town', $local_in_town, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

}