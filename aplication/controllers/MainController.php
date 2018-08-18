<?php

namespace aplication\controllers;

use aplication\core\Controller;
use aplication\core\View;

class MainController extends Controller{

  function __construct($parameters){
		parent::__construct($parameters);

		$this->params = $parameters;
		$this->view = new View($parameters);
	 }

    function listAction(){
			$title = 'DTEK Academy';
      $data = $this->model->get_data();

      // $db = new Db;
      // $form = '1; Delete FROM test';
      // $params = ['id'=>$form,];
      //
      // // $data = $db->column('SELECT name FROM test WHERE id = :id', $params);
      //
      // $prop = $this->model->get_data();
      //


      // debug($vars);

    
      $this->view->render($title, $data);
    }
  }
?>
