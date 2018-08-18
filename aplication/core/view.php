<?php

namespace aplication\core;

class View
{
  public $params;
  public $layout = 'default';
//public $template_view; // здесь можно указать общий вид по умолчанию.
  function __construct($params){
    $this->params = $params;
    // debug($params['controller_name']);
  }

  public function render($title, $vars = []){
    extract($vars);
    $name = $this->params['controller_name'];
    $path = ROOT.'/aplication/views/'.$name. '/'.$name.'.php';
    if (file_exists($path)){
      ob_start();
      require $path;
      $content = ob_get_clean();
      require ROOT.'/aplication/views/layout/'.$this->layout.'.php';
    }else {
      echo "Страница вида не найдена".$path.'.php';
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
