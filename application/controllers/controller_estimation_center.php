<?php

class Controller_Estimation_Center extends Controller
{

	function __construct()
	{
		//$this->model = new Model_Portfolio();
		$this->view = new View();
	}
	
	function action_index()
	{
		//$data = $this->model->get_data();		
		$this->view->generate('estimation_center_view.php', 'template_view.php');
	}
}
?>