<?php
/**
 * Контроллер SiteController
 */

class SiteController
{
    public function actionIndex()
    {
        // Переменная для формы
        $text = '';

        // Обработка формы
        if(isset($_POST['submit'])){

            // Если форма отправлена
            // Получаем данные из нее
            $text = $_POST['text'];

            //Отправляем записаные пользователем данные на обработку
            $result = Form::actionForm($text);
        }
        require_once(ROOT . '/views/site/index.php');

        return true;
    }
}