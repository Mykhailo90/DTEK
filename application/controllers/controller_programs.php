<?php

class Controller_Programs extends Controller
{

	function __construct()
	{
		$this->model = new Model_Programs();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('programs_view.php', 'template_view.php', $data);
	}
}
?>