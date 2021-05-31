<?php
class Controller_Login extends Controller
{
	function __construct()
	{
    $this->model = new Model_Login();
		$this->view = new View();
	}
	
	function action_index()
	{
    $data = $this->model->get_data();
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}

  function action_login()
  {
    $this->model->login($_POST);
    header("LOCATION: $URL/login");
  }

  function action_out()
  {
    $this->model->out();
    header("LOCATION: $URL/login");
  }

  function action_add_news()
  {
    $this->model->add_news($_POST);
    header("LOCATION: $URL/login");
  }

  function action_detail_news()
  {
    $data = $this->model->get_detail_news($_POST);
    $this->view->generate('detail_news_view.php', 'template_view.php', $data);
  }

  function action_change_news()
  {
    $this->model->change_news($_POST);
    header("LOCATION: $URL/login");
  }

  function action_delete_news()
  {
    $this->model->delete_news($_POST);
    header("LOCATION: $URL/login");
  }

  function action_add_image()
  {
    $this->model->add_image($_POST);
    header("LOCATION: $URL/login");
  }
}
?>
