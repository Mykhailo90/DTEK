<?php

namespace aplication\controllers;

use aplication\core\Controller;
use aplication\core\View;

/*
* Класс обеспечивает взаимодействие между моделью и отображением главной страницы
*
* The class provides the interaction between the model and the display of the main page
*/

class ProgramsController extends Controller{
  function __construct($parameters){
// Передаем в родительский класс параметры для инициализации модели
// Pass to the parent class the parameters for initializing the model
		parent::__construct($parameters);
		  $this->view = new View($parameters);
	 }

// Метод для получения данных необходимых для отображения главной страницы
// Method for getting the data required to display the main page
    function listAction(){
      if (!isset($_SESSION['current_page'])) {
            $_SESSION['current_page'] = 1;

        }
        if (isset($_POST['page'])) {
            $_SESSION['current_page'] = $_POST['page'];
        }

        // echo "<pre>";
        //  var_dump($_POST);
        //  echo "</pre>";
// Вынести количество элементов на странице в конфигурациооный файл
      $elements_per_page = 5;

			$title = 'DTEK Academy';
      $data = $this->model->get_data($this->params['action']);
      $count_of_pages = ceil(count($data['programs']) / $elements_per_page);
      $check = array_slice($data['programs'], ($_SESSION['current_page'] - 1) * $elements_per_page, $elements_per_page);
      $data['pages'] = $count_of_pages;
      $data['programs'] = $check;
      $data['url'] = $this->params['route'];
      $this->view->render($title, $data);
    }

    function treningsAction(){
			$title = 'DTEK Academy';
      $data = $this->model->get_data($this->params['action']);
      $this->view->render($title, $data);
    }

    function team_buildingsAction(){
			$title = 'DTEK Academy';
      $data = $this->model->get_data($this->params['action']);
      $this->view->render($title, $data);
    }

    function module_programsAction(){
      $title = 'DTEK Academy';
      $data = $this->model->get_data($this->params['action']);
      $this->view->render($title, $data);
    }
  }
?>
