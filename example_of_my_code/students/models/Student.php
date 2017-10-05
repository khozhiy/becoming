<?php
/**
 * Created by PhpStorm.
 * User: Khozh
 * Date: 03.10.2017
 * Time: 19:14
 */

class Student
{
    public static function getStudents()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM students');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    /**
     * @param $count
     * @param int $page
     * @return array
     */
    public static function getStudentsOnPage($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);
        $page = intval($page-1);
        $offset = $page * $count;

        $db = Db::getConnection();
        $studentsList = array();

        $result = $db->query('SELECT id, name, surname, number_groop, number_balls FROM students '
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count
            . ' OFFSET '. $offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $studentsList[$i]['id'] = $row['id'];
            $studentsList[$i]['name'] = $row['name'];
            $studentsList[$i]['surname'] = $row['surname'];
            $studentsList[$i]['number_groop'] = $row['number_groop'];
            $studentsList[$i]['number_balls'] = $row['number_balls'];
            $i++;
        }

        return $studentsList;
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }
}


