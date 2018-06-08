<?php

class Controller_Trenings_Emotional_Intellect extends Controller
{

	function action_index()
	{
		$this->view->generate('trenings_emotional_intellect_view.php', 'template_view.php');
	}
}
?>