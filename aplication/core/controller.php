<?php

namespace aplication\core;

use aplication\core\View;
use aplication\models\Main;
use aplication\models\Programs;

/*
* Класс обеспечивает взаимодействие между моделью и отображением страницы
*
* The class provides the interaction between the model and the display of the page
*/

abstract class Controller {

// Переменная для хранения экземпляра модели
// Variable for storing model object
  public $model;
// Переменная для хранения объекта отображения
// Variable for storing view object
  public $view;
// Переменная для хранения параметров маршрута
// Variable for storing route parameters
  public $params;

  function __construct($params){
    $this->params = $params;
    // $this->view = new View($params);
// Определение имени класса модели и пути подключения
// Determine the name of the model class and the connection model path
    $this->model = $this->loadModel($params['controller_name']);
  }

  /*
  * Функция принимает имя модели класса, создает полный путь и возвращает объкт класса модели
  *
  * The function takes the name of the model of the class, creates the full path and returns the object model class
  */
  public function loadModel($name){
      $class_name = 'aplication\models\\' . ucfirst($name) . 'Model';
      $path = ROOT .'/aplication/models/' . ucfirst($name) . 'Model.php';
      if (file_exists($path)){
        return new $class_name($this->params);
      }
  }
}
?>
