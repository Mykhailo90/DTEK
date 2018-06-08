<?php

class Controller_Strategic_Sessions extends Controller
{

	function __construct()
	{
		//$this->model = new Model_Portfolio();
		$this->view = new View();
	}
	
	function action_index()
	{
		//$data = $this->model->get_data();		
		$this->view->generate('strategic_sessions_view.php', 'template_view.php');
	}
}
?>