<?php

namespace aplication\core;

use aplication\lib\ParentPath;
/*
* Класс осуществляет процесс маршрутизации
*
* The class realize the routing process
*/

class Router {

  // Переменная для хранения массива доступных маршрутов
  // Variable for storing an array of available routes
    protected $routes = [];

  // Переменная для хранения массива с маршрутом, именем контроллера, метода, параметра
  // Variable for storing an array with a path, controller_name, method_name and parameters
    protected $params = [];

  // Получаем из базы данных возможные маршруты
  // We get from the database possible routes
    function __construct()
    {
      $tmp = new ParentPath();
      $this->routes = $tmp->arr;
    }

    private function match(){
      $url = trim($_SERVER['REQUEST_URI'], '/');
      $url = '#^'.$url.'$#';
      foreach ($this->routes as $value) {
      if (preg_match($url, $value, $matches)){
        $this->parsing_path($matches[0]);
        // $this->params = $matches;
        return true;
      }
    }
    return false;
  }

  /*
  * Функция принимает путь и выделяет имя контроллера, метода и параметры
  *
  * The function takes a path and selects the controller name, method, and parameters
  */
  private function parsing_path($path){
    $route = $path;

    //Дефолтное значение для имени контроллера
    //The default value for the controller name
    $controller_name_def = 'main';

    //Дефолтное значение для имени метода
    //The default value for the method name
    $action_def = 'list';

    // Разбиваем путь на массив по разделителю
    // Split the path to the array by separator
    $parameters = explode("/", $route);

    // Поочередно выделяем имя контроллера, имя метода
    // Select the controller name, the name of the method
    $controller_name = array_shift($parameters);

    // Если путь не содержит имя контроллера или метода
    // задаем дефолтное значение.

    //If the path does not contain the name of the controller or method
    // set the default value.
    $controller_name = (empty($controller_name)) ? $controller_name_def
                                                  : $controller_name;
    $action = array_shift($parameters);
    $action = (empty($action)) ? $action_def
                                : $action;

    // Сохраняем значения в переменную класса в виде массива
    // Save the values ​​to the class variable as an array
    $this->params['route'] = $route;
    $this->params['controller_name'] = $controller_name;
    $this->params['action'] = $action;
    $this->params['parameters'] = $parameters;
  }

    public function run(){
      if($this->match()){
        $path = ROOT.'/aplication/controllers/'.ucfirst($this->params['controller_name']).'Controller.php';
        if (file_exists($path)){
          $action = $this->params['action'].'Action';
          $class_name = 'aplication\controllers\\' . ucfirst($this->params['controller_name']).'Controller';
          if (method_exists($class_name, $action)){

            $controller = new $class_name($this->params);
            $controller->$action();
          }
          else {
            View::errorCode(404);
          }
        }else {
          View::errorCode(404);
        }
      }
      else {
        View::errorCode(404);
      }
    }
  }
 ?>
