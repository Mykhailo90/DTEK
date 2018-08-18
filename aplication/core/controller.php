<?php

namespace aplication\core;

use aplication\core\View;
use aplication\models\Main;

abstract class Controller {
  public $model;
  public $view;
  public $route;
  function __construct($route){
    $this->route = $route;
    $this->view = new View($route);
    $this->model = $this->loadModel($this->route['controller']);
  }

  public function loadModel($name){
      $path = 'models\\'.ucfirst($name);
      if (class_exists($path)){
        return new $path();
      }
  }

  //abstract function indexAction();
}
?>
