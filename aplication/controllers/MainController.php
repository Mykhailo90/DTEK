<?php

namespace aplication\controllers;

use aplication\core\Controller;
use aplication\core\View;

class MainController extends Controller{

  function __construct($parameters){
		$this->params = $parameters;
    // require_once ROOT . '/models/model_main.php';
		// $this->model = new Model_main();
		$this->view = new View($parameters);
	 }

    function listAction(){
			$title = 'DTEK Academy';
      // $res = $this->model->get_data();

      // $db = new Db;
      // $form = '1; Delete FROM test';
      // $params = ['id'=>$form,];
      //
      // // $data = $db->column('SELECT name FROM test WHERE id = :id', $params);
      //
      // $prop = $this->model->get_data();
      //
      $vars = [];

      // debug($vars);

      // $vars = [
      //   'res' => $res,
      // ];
      $this->view->render($title, $vars);
    }
  }
?>
