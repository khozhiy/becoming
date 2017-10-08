<?php
/**
 * Контроллер SiteController
 */

class SiteController
{
    public function actionIndex()
    {
        $search_string = '';
        if (isset($_POST['submit'])){
            $search_string = $_POST['search'];
        }

        $search = array();
        $search = Search::getResultsSearch($search_string);
        print_r($search);

        $kols = array(1);
        $kols = Search::getSearchOnPage(100,1, $search_string);

        $students = array();
        $students = Student::getStudents();

        $studentsOnPage = array(1);
        $studentsOnPage = Student::getStudentsOnPage(50);

        require_once(ROOT . '/views/site/index.php');

        return true;
    }
}