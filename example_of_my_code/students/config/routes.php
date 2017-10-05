<?php
/**
 * Массив для хранения маршрутов
 */
return array(
    //Пользователь
    'user/register' => 'user/register', // actionRegister в UserController
    'user/login' => 'user/login',// actionLogin в UserController
    'user/logout' => 'user/logout',// actionLogout в UserController
    //Кабинет
    'cabinet' => 'cabinet/index',// actionIndex в CabinetController
    // Главная страница
    '' => 'site/index', // actionIndex в SiteController
);