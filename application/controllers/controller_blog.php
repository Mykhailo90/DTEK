<?php

class Controller_Blog extends Controller
{

	function action_index()
	{
		$this->view->generate('blog_view.php', 'template_view.php');
	}
}
?>