<?php

namespace aplication\core;

/*
* Класс отвечает за уровень отображения контента, вызов необходимого
* класса отображения конкретной страницы
*
* The class is responsible for the level of content display, calling the required
* class of displaying a particular page
*/

class View
{
// Содержит параметры маршрутизации страницы
// Contains routing options
  public $params;
// Хранит шаблон отображения по умолчанию
// Stores the default display template
  public $layout = 'default';

// Конструктор сохраняет переданные значения в переменную
// The constructor saves the passed values ​​to a variable
  function __construct($params){
    $this->params = $params;
  }

  /*
  * Функция принимает заголовок страницы и массив данных для отображения
  * Отвечает за формирование контента страницы
  * The function takes a page header and an array of data to display
  * Responsible for the formation of the page content
  */

  public function render($title, $vars = []){
  // Разбиваем массив на обособленные переменные
  // We split the array into separate variables
    extract($vars);
  // Определяем имя и путь к файлу отображения
  // Define the name and the path to the display file
    $name = $this->params['controller_name'];
    $path = ROOT.'/aplication/views/'.$name. '/'.$name.'.php';

    if (file_exists($path)){
  // Если указанный файл существует, сохраняем его содержимое в переменную
  // If the specified file exists, we store its contents in a variable
      ob_start();
      require $path;
      $content = ob_get_clean();
  // Выводим содержимое пользователю
  // Displaying the content to the user
      require ROOT.'/aplication/views/layout/'.$this->layout.'.php';
    }else {
      echo "Страница вида не найдена".$path.'.php';
    }
  }

// Функция принимает адрес и осуществляет переход на него
// The function takes an address URL and moves to it

  public function redirect($url){
    header('location: '.$url);
    exit();
  }

  // Функция принимает код ошибки  и осуществляет переход на страницу отображения
  // The function takes an error code and moves to the display page

  public static function errorCode($code){
    http_response_code($code);
    require ROOT.'/views/errors/'.$code.'.php';
    exit();
  }
}
?>
