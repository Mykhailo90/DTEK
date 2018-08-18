<?php

namespace aplication\core;

use aplication\core\View;
use aplication\models\Main;

abstract class Controller {
  public $model;
  public $view;
  public $route;
  public $params;

  function __construct($params){
    $this->params = $params;
    $this->view = new View($params);
    $this->model = $this->loadModel($params['controller_name']);
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
