<?php
class Controller_Main extends Controller
{
	function __construct()
	{
    $this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_detail_news()
	{
		$data = $this->model->get_detail_news($_POST);
		$this->view->generate('main_detail_view.php', 'template_view.php', $data);
	}

	function action_add_comment()
	{
		$this->model->add_comment($_POST);
		header("LOCATION: $URL/main");
	}
}
?>
