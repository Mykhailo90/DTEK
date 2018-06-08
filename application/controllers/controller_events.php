<?php

class Controller_Events extends Controller
{

	function action_index()
	{
		$this->view->generate('events_view.php', 'template_view.php');
	}
}
?>