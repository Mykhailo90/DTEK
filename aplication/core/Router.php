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
  // We get possible routes from the database
    function __construct()
    {
      $tmp = new ParentPath();
      $this->routes = $tmp->arr;
    }

    /*
    * Функция проверяет вхождение введенного URL в массив дозволенных адресов
    * возвращает булевое значение true или false
    * The function checks the entered URL in an array of allowed addresses
    * return boolean value true or false
    */
    private function match(){
      $url = trim($_SERVER['REQUEST_URI'], '/');
    // Обозначаем URL как регулярное выражение
    // Denote URL as regular expression
      $url = '#^'.$url.'$#';

      foreach ($this->routes as $value) {
    // Если найдено вхождение вызывается функция для определения параметров
    // имя контроллера, имя метода и параметры

    //If an occurrence is found, we called  a function to determine the parameters:
    // controller name, method name and other parameters
      if (preg_match($url, $value, $matches)){
        $this->parsing_path($matches[0]);
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

  // Проверяем вхождение введенного URL в массив дозволенных адресов
  // Сhecks the entered URL in an array of allowed addresses
      if($this->match()){
  // Определяем путь к контроллеру
  // Determine the path to the controller
        $path = ROOT.'/aplication/controllers/'.ucfirst($this->params['controller_name']).'Controller.php';
        if (file_exists($path)){
  // Если путь найден - определяем имя метода
  // If the path is found, define the method name
          $action = $this->params['action'].'Action';
          $class_name = 'aplication\controllers\\' . ucfirst($this->params['controller_name']).'Controller';
  // Проверяем наличие необоходимого метода в классе
  // Сheck the necessary method in the class
          if (method_exists($class_name, $action)){
  // Если метод найден создаем экземпляр класса контроллера
  // Вызываем необходимый метод
  // If the method is found, create an object of the controller class
  // Call the required method
            $controller = new $class_name($this->params);
            $controller->$action();
          }
          else {
// Если не найден класс, метод или файл - вызываем отображение ошибки
// If no class, method, or file is not found - call the error display
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
