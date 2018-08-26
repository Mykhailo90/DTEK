<?php

namespace aplication\models;

use aplication\core\Model;
use aplication\lib\Registry;
use PDO;

class ProgramsModel extends Model
{

    public function get_data($arg = '')
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

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $navMenu = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

        // запрос в базу данных для получения данных для станицы "Программы"
        // request to the database to retrieve data for the "Programs" page
        // debug($arg);
        $arg = sprintf("CALL programs ('%s')", $arg);
        $query = $arg;

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $programs = array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $programs = $result->fetchAll(PDO::FETCH_ASSOC);

          }

          // удаляем переменные
          // delete the variables
          unset($result, $query);

        // запрос в базу данных для фильтра("Тип") на странице "programs"
        // query the database for the filter ("Type") on the "programs" page
        $query = "CALL type_event ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $filterType = Array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $filterType = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);


        // запрос в базу данных для фильтра("Для кого") на странице "programs"
        // query the database for the filter ("For whom") on the "programs" page
        $query = "CALL directions ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $filterForWhom = Array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $filterForWhom = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);


        // запрос в базу данных для фильтра("Тематика") на странице "programs"
        // query the database for the filter ("Themes") on the "programs" page
        $query = "CALL subject_type ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $filterSubjects = Array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $filterSubjects = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

        // запрос в базу данных для фильтра("Куратор") на странице "programs"
        // query the database for the filter ("Trainer") on the "programs" page
        $query = "CALL treners ()";

        // создаем массив для заполнения информацией из базы данных
        // create an array for filling information from the database
        $filterTrainer = Array();
        if ($result = $link->query($query)) {

            // заполнить массив данными полученными из запроса
            //fill the array with data retrieved from the query
            $filterTrainer = $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // удаляем переменные
        // delete the variables
        unset($result, $query);

        // Формируем массив с полученными данными
        // We form an array with the obtained data

        $allData = array('navMenu' => $navMenu,
                        'programs' => $programs,
                        'filterType' => $filterType,
                        'filterForWhom' => $filterForWhom,
                        'filterSubjects' => $filterSubjects,
                        'filterTrainer' => $filterTrainer,
                        );

        return $allData;
    }

}

