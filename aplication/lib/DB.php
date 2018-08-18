<?php

namespace aplication\lib;

use PDO;
use aplication\lib\Regystry;

/*
* Класс обеспечивает коммуникацию с базой данных
*
* The class provides communication with the database
*/

class DB {

  /*
  * Функция создает указатель на соединение с базой данных
  * и сохраняет значение в соответствующую переменную
  *
  * The function creates a pointer to the connection to the database
  * and save the value in the Regystry object
  */

  static function get_DB_in_Registry(){
    $obj = Registry::getInstance();

  // Получаем параметры конфигурации доступа к базе данных
  // Get the parameters of the configuration of access to the database
    $params = include(ROOT . '/aplication/config/db_access.php');

    $db = new PDO($params['DB_DSN'], $params['DB_USER'], $params['DB_PASSWORD']);

  //Сохраняем значение в объект Regystry
  //save the value in the Regystry object
    $obj->changeProperty('DB', $db);
  }
}
