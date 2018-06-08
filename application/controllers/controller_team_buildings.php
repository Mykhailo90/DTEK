<?php

class Controller_Team_Buildings extends Controller
{

	function __construct()
	{
		//$this->model = new Model_Portfolio();
		$this->view = new View();
	}
	
	function action_index()
	{
		//$data = $this->model->get_data();		
		$this->view->generate('team_buildings_view.php', 'template_view.php');
	}
}
?>