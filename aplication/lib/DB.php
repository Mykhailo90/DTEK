<?php

namespace aplication\lib;

use PDO;
class DB {
  function __construct(){
        $obj = Registry::getInstance();
        $params = include(ROOT . '/aplication/config/db_access.php');
        $db = new PDO($params['DB_DSN'], $params['DB_USER'], $params['DB_PASSWORD']);
        $obj->changeProperty('DB', $db);
    }
}
