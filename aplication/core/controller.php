<?php

namespace aplication\core;

use aplication\core\View;
use aplication\models\Main;

abstract class Controller {
  public $model;
  public $view;
  public $params;

  function __construct($params){
    $this->params = $params;
    $this->view = new View($params);
    $this->model = $this->loadModel($params['controller_name']);
  }

  public function loadModel($name){
      $class_name = 'aplication\models\\' . ucfirst($name) . 'Model';
      $path = ROOT .'/aplication/models/' . ucfirst($name) . 'Model.php';
      if (file_exists($path)){
        return new $class_name();
      }
  }
}
?>
