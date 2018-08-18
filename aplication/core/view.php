<?php

namespace aplication\core;

class View
{
  public $path;
  public $route;
  public $layout = 'default';
//public $template_view; // здесь можно указать общий вид по умолчанию.
  function __construct($route){
    $this->route = $route;
    $this->path = $route['controller'].'/'.$route['action'];
    // debug($this->path);
  }

  public function render($title, $vars = []){
    extract($vars);
    if (file_exists(ROOT.'/views/'.$this->path.'.php')){
      ob_start();
      require 'views/'.$this->path.'.php';
      $content = ob_get_clean();
      require 'views/layout/'.$this->layout.'.php';
    }else {
      echo "Страница вида не найдена".$this->path.'.php';
    }
  }

  public function redirect($url){
    header('location: '.$url);
    exit();
  }
  
  public static function errorCode($code){
    http_response_code($code);
    require ROOT.'/views/errors/'.$code.'.php';
    exit();
  }
}
?>
