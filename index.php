<?php
/*
* Создаем константу корневой директории.
*
* Create a constant for the root directory.
*/

define('ROOT', dirname(__FILE__));
/*
* Подключаем файл базовой инициализации приложения.
*
* We connect the basic application initialization file.
*/

require 'aplication/lib/Dev.php';

use aplication\core\Router;


session_start();

/*
* Создаем объкт маршрутизации и вызываем главный метод.
*
* Сreate the routing object and call the main method.
*/
$router = new Router();
$router->run();
