<?php

class Controller_Consulting extends Controller
{

	function action_index()
	{	
		$this->view->generate('consulting_view.php', 'template_view.php');
	}
}