<?php

class Controller_Blog_Id_2 extends Controller
{

	function action_index()
	{
		$this->view->generate('blog_id_2_view.php', 'template_view.php');
	}
}
?>