<?php

class Controller_Blog_Id_1 extends Controller
{

	function action_index()
	{
		$this->view->generate('blog_id_1_view.php', 'template_view.php');
	}
}
?>