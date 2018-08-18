<?php

namespace aplication\core;

use aplication\lib\ParentPath;
/*
* Класс осуществляет процесс маршрутизации
*
* The class realize the routing process
*/

class Router {
    protected $routes = [];
    //protected $params = [];
    function __construct()
    {
      // Написать класс для загрузки конфигурационных файлов
      // А также класс для определения параметров(экшена)

      //Запрос к БД для получения всех возможных маршрутов
      $tmp = new ParentPath();
      $this->routes = $tmp->arr;
    }

    public function add($route, $params){
      $route = '#^'.$route.'$#';
      $this->routes[$route] = $params;
    }
    public function match(){
      $url = trim($_SERVER['REQUEST_URI'], '/');
      foreach ($this->routes as $route => $params) {
        if (preg_match($route, $url, $matches)){
          $this->params = $params;
          return true;
        }
      }
      return false;
    }
    public function run(){
      if($this->match()){
        // $path = ROOT.'/'.'controllers/'.ucfirst($this->params['controller']).'Controller.php';
        $path = 'controllers\\'.ucfirst($this->params['controller']).'Controller';
        if (class_exists($path)){
          $action = $this->params['action'].'Action';
          if (method_exists($path, $action)){
            $controller = new $path($this->params);
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
