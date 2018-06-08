<?php

class Controller_Conference_Service extends Controller
{

	function __construct()
	{
		//$this->model = new Model_Programs();
		$this->view = new View();
	}
	
	function action_index()
	{
		//$data = $this->model->get_data();		
		$this->view->generate('conference_service_view.php', 'template_view.php');
	}
}
?>