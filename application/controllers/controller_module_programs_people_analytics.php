<?php

class Controller_Module_Programs_People_Analytics extends Controller
{

	function action_index()
	{
		$this->view->generate('module_programs_people_analytics_view.php', 'template_view.php');
	}
}
?>