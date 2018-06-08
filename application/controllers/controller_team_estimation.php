<?php

class Controller_Team_Estimation extends Controller
{
	
	function action_index()
	{
		$this->view->generate('team_estimation_view.php', 'template_view.php');
	}

}
