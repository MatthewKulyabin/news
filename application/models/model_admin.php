<?php
class Model_Admin extends Model
{
	function __construct()
	{
		$this->auth = new AuthClass();
	}

	public function get_data()
	{	
		$data = array();
		$data['sections'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM sections;");
		$data['news'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM news;");
		$data['comments'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM comments;");
		return $data;
	}

	public function out()
	{
		$this->auth->out();
	}

	public function login($post)
	{
		$result = $this->auth->auth($post['login'], $post['password']);
    if (!$result) {
      echo "The Login and Password is incorrect";
    } else {
      echo "You've loged in";
    }
	}

	public function add_section($post)
	{
		$title = $post['title'];
    $query = "INSERT INTO sections (title) VALUES ('$title')";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
	}

	public function get_detail_section($post)
	{
		$id = $post['id'];
		return getFromTable($GLOBALS['mysqli'], "SELECT * FROM sections WHERE id=$id;")[0];
	}

	public function change_section($post)
	{
		$id = $post['id'];
		$title = $post['title'];
		$query = "UPDATE sections SET title='$title' WHERE id=$id";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
	}

	public function delete_section($post)
	{
		$id = intval($post['id']);
		$query = "DELETE FROM sections WHERE id=$id";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
	}

	public function delete_comment($post)
	{
		$id = $post['id'];
		$query = "DELETE FROM comments WHERE id=$id";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
	}
}
?>
