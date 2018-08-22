<?php

namespace aplication\models;

use aplication\core\Model;
use aplication\lib\Registry;
use PDO;

class MainModel extends Model
{

    public function get_data($arg='')
    {
        $link = Registry::getInstance()->getProperty('DB');
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // запрос в базу данных для получения данных для навигационного меню
        // query the database to retrieve data for the navigation menu
        $query = "CALL navMenu ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $navMenu = Array();
        if ($result = $link->query($query)) {

            // заполнить массив данными получgiенными из запроса
            //fill the array with data retrieved from the query
            $navMenu = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

        // запрос в базу данных для получения данных для баннеров
        // query the database to retrieve data for banners
        $query = "CALL banners ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $baners = array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $baners = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

/*
 *
 * нужно переделать запрос с джоином адрес фото из таблицы img
 * к полям таблицы mod_programs (аналог feedback запроса)
 *
 * */

        // запрос в базу данных для получения данных для раздела "Направления"
        // query the database to retrieve data for the "Directions" section
        $query = "CALL directions ();";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $direction = array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $direction = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

        // запрос в базу данных для получения данных для раздела "Календарь"
        // query the database to retrieve data for the "Calendar" section
        $query = "CALL calendar ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $calendar = array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $calendar = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

        // запрос в базу данных для получения данных для раздела "Отзывы"
        // query the database to retrieve data for the "Reviews" section
        $query = "CALL feedback ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $feedback = array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $feedback = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

        // запрос в базу данных для получения данных для раздела "Популярные програмы"
        // query the database to retrieve data for the "Popular Programs" section
        $query = "CALL popular_programs ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $popular_programs = array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $popular_programs = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

        // Ожыдаем подключения к базе WP
//        $query = "SELECT id, title, date_publication, short_info, blog_name, category FROM `blog`;";
        $blog = array();
//        if ($result = $link->query($query)) {
//            $blog = $result->fetchAll(PDO::FETCH_ASSOC);
//        }
//        unset($result, $query);

        // Формируем массив с полученными данными
        // We form an array with the obtained data
        $allData = array('navMenu' => $navMenu, 'baners' => $baners, 'direction' => $direction, 'calendar' => $calendar,
            'feedback' => $feedback, 'popular_programs' => $popular_programs, 'blog' => $blog);

        return $allData;
    }
}
