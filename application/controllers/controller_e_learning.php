<?php

class Controller_E_Learning extends Controller
{

	function action_index()
	{
		$this->view->generate('e_learning_view.php', 'template_view.php');
	}
}
?>