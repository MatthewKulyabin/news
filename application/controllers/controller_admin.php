<?php
class Controller_Admin extends Controller
{
  function __construct()
	{
    $this->model = new Model_Admin();
		$this->view = new View();
	}

	function action_index()
	{
    $data = $this->model->get_data();
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}

  function action_out()
  {
    $this->model->out();
    header("LOCATION: $URL/admin");
  }

  function action_login()
  {
    $this->model->login($_POST);
    header("LOCATION: $URL/admin");
  }

  function action_add_section()
  {
    $this->model->add_section($_POST);
    header("LOCATION: $URL/admin");
  }

  function action_detail_section()
  {
    $data = $this->model->get_detail_section($_POST);
    $this->view->generate('detail_section_view.php', 'template_view.php', $data);
  }

  function action_change_section()
  {
    $this->model->change_section($_POST);
    header("LOCATION: $URL/admin");
  }

  function action_delete_section()
  {
    $this->model->delete_section($_POST);
    header("LOCATION: $URL/admin");
  }

  function action_delete_comment()
  {
    $this->model->delete_comment($_POST);
    header("LOCATION: $URL/admin");
  }
}
?>
