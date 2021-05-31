<?php
class Controller_Signup extends Controller
{
	function __construct()
	{
		$this->model = new Model_Signup();
		$this->view = new View();
	}

	function action_index()
	{	
		$this->view->generate('signup_view.php', 'template_view.php');
	}

	public function action_registrate()
	{
		$this->model->registrate($_POST);
		header("LOCATION: $URL/signup");
	}
}
?>
