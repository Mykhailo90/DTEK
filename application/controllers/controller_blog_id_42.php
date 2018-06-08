<?php

class Controller_Blog_Id_42 extends Controller
{

	function action_index()
	{
		$this->view->generate('blog_id_42_view.php', 'template_view.php');
	}
}
?>