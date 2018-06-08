<?php

class Controller_Academy extends Controller
{

	function action_index()
	{
		$this->view->generate('academy_view.php', 'template_view.php');
	}
}
?>