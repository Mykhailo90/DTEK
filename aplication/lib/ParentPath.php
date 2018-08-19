<?php

namespace aplication\lib;

use PDO;

/*
* Класс получает из базы данных список возможных адресов и возвращает в контроллер
* The class gets a list of possible URL addresses from the database and returns it to the controller
*/

Class ParentPath {
// Переменная для хранения адресов
// Variable for storing URL addresses
  public $arr = [];

  public function __construct() {
    $this->arr = $this->getArray();
  }

  private function getArray(){
// Получаем экземпляр "Sengleton" объекта
// We get a pointer on the "Sengleton" object
    $obj = Registry::getInstance();
// Получаем указатель на соединение с базой данных
// We get a pointer to db connection
    $db = $obj->getProperty('DB');
    
// Делаем запрос к базе данных и возвращаем результат
// Make the query to the database and return the result
    $prepare = $db->prepare('SELECT path_to_program FROM mod_programs');
    $prepare->execute();
    return $prepare->fetchAll(PDO::FETCH_COLUMN);
  }
}
