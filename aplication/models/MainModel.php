<?php

namespace aplication\models;

use aplication\core\Model;
use aplication\lib\Registry;
use PDO;

class MainModel extends Model
{

    public function get_data()
    {
        $link = Registry::getInstance()->getProperty('DB');
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Вносим все строки массив list_of_programs
        $query = "SELECT * FROM mod_programs WHERE parent_page = '9' AND check_on = '1';"; // Запрос списка страниц
        $navMenu = Array();
        if ($result = $link->query($query)) {

            /* Get field information for all columns */
            $navMenu = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        unset($result, $query);

        $query = "SELECT * FROM `banner_table` WHERE id_page ='9' AND check_on = '1';";
        $baners = array();
        if ($result = $link->query($query)) {
            $baners = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        unset($result, $query);
        // debug($baners);
/*
 *
 * нужно переделать запрос с джоином адрес фото из таблицы img
 * к полям таблицы mod_programs (аналог feedback запроса)
 *
 * */
        $query = "SELECT * FROM directions;";

        $direction = array();
        if ($result = $link->query($query)) {
            $direction = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        unset($result, $query);

        $query = "SELECT title, start_date, place, short_info FROM `events`";
        $calendar = array();
        if ($result = $link->query($query)) {
            $calendar = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        unset($result, $query);

        $query = "SELECT UF.id, UF.msg, UF.img_path, UA.user_name, UA.user_surname,
        UA.user_company FROM users_feedback UF JOIN users_all UA WHERE UF.user_id=UA.id AND UF.check_on = '1'";
        $feedback = array();
        if ($result = $link->query($query)) {
            $feedback = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        unset($result, $query);
        $query = "SELECT * FROM `mod_programs` WHERE check_on=1 AND (parent_page='85' OR parent_page='84' OR parent_page='81')";
        $popular_programs = array();
        if ($result = $link->query($query)) {
            $popular_programs = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        unset($result, $query);

        $query = "SELECT id, title, date_publication, short_info, blog_name, category FROM `blog`;";
        $blog = array();
        if ($result = $link->query($query)) {
            $blog = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        unset($result, $query);
        $allData = array('navMenu' => $navMenu, 'baners' => $baners, 'direction' => $direction, 'calendar' => $calendar,
            'feedback' => $feedback, 'popular_programs' => $popular_programs, 'blog' => $blog);
//        echo '<pre>';
//        print_r($allData);
//        echo '</pre>';
        return $allData;



    }
}
