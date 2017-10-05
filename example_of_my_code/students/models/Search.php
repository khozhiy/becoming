<?php
/**
 * Created by PhpStorm.
 * User: Khozh
 * Date: 05.10.2017
 * Time: 19:30
 */

class Search
{
    /**
     * @param $count
     * @param int $page
     * @return array
     */
    public static function getSearchOnPage($count, $page, $search_string)
    {
        $count = intval($count);
        $page = intval($page-1);
        $offset = $page * $count;

        $db = Db::getConnection();
        $studentsList = array();

        $result = $db->query("SELECT * FROM students WHERE concat(name,surname,number_groop,number_balls) LIKE '%$search_string%' "
            . 'ORDER BY id DESC ');
        $result->bindParam(':search_string', $search_string, PDO::PARAM_STR);
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

    public static function getResultsSearch($search_string)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM students WHERE concat(name,surname,number_groop,number_balls) LIKE '%:search_string%'";

        $result = $db->query($sql);
        $result->bindParam(':search_string', $search_string, PDO::PARAM_STR);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
}