<?php
/*
* Устанавливаем настройки отображения  всех ошибок
*
* Set ON settings for display all errors
*/
use aplication\lib\DB;

ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
* Создаем константу разделитель для указания маршрутов
* в любой операционной системе.
*
* Create a constant delimiter to specify routes
* in any operating system.
*/
define ('DS', DIRECTORY_SEPARATOR);

/*
* Функция выводит на экран значение переменной
* в стиле вывода функции принтф или вардамп.
* Может принимать 2 аргумента (имя переменной и тип вывода значения).
*
* This function print value of variable in
* type like as printf or var_dump styles.
* It can take 2 arguments (the name of the variable
* and the type of the output).
*/

function debug($var, $type = 'p'){
  echo '<pre>';
    if ($type == 'v'){
      var_dump($var);
    }
    else if ($type == 'p'){
      print_r($var);
    }
  echo '</pre>';
  exit();
}

/*
* Функция автоматической загрузки классов
* Вызывается в момент вызова конструктора класса
*
* Automatic class loading function
* Called when the class constructor was сreated
*/

spl_autoload_register(function($class) {

  // Меняем "\", используемый в namespace на разделитель aдреса
  // Change the "\" used in namespace to the address separator
  $path = str_replace('\\', DS, $class);

  // Приводим путь к необходимой форме, убрав разделители по краям
  // We change the way to the required form by removing the delimiters at the edges
  $path = trim($path, '/').'.php';

  // Проверяем существование файла с классом
  // Сheck existence of a file with the class
  if (file_exists($path)){
    require $path;
  }
});

  // Сохраняем указатель доступа к базе данных в Registry
  // Save the DB pointer connect in Regystry object
  DB::get_DB_in_Registry();

 ?>
