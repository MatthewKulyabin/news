<?php
class Model_Login extends Model
{
	function __construct()
  {
    $this->auth = new AuthClass();
  }

  public function get_data()
  {
    $data = array();
    $user_id = $_SESSION['user_id'];
    $data['news'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM news WHERE user_id=$user_id;");
    $data['sections'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM sections"); 
    return $data;
  }

  public function login($post)
  {
    $login = $post['login'];
    $password = $post['password'];
    if (!$this->auth->auth($login, $password)) {
      echo "The Login and Password is incorrect";
    } else {
      echo "You've loged in";
    }
  }

  public function out()
  {
    $this->auth->out();
  }

  public function add_news($post)
  {
    $user_id = intval($_SESSION['user_id']);
    $title = $post['title'];
    $image = imageConverting();
    $section_id = intval(getStringBetween($post['section'], '(', ')'));
    $query = "INSERT INTO news (title, main_image, user_id, section_id)
      VALUES ('$title', '$image', $user_id, $section_id)
    ";
    if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from post to table";
    } else {
      echo "Success!";
    }
  }

  public function get_detail_news($post)
  {
    $id = $post['id'];
    $data = array();
    $data['news'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM news WHERE id=$id;")[0];
    $data['images'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM images WHERE news_id=$id;");
    return $data;
  }

  public function change_news($post)
	{
    $id = intval($post['id']);
    $title = $post['title'];
    $image = imageConverting();
		$query = "UPDATE news SET title='$title', main_image='$image' WHERE id=$id";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
	}

  public function delete_news($post)
  {
    $id = $post['id'];
		$query = "DELETE FROM news WHERE id=$id";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
  }

  public function add_image($post)
  {
    $user_id = intval($_SESSION['user_id']);
    $id = intval($post['id']);
    $image = imageConverting();
    $query = "INSERT INTO images (image, news_id, user_id)
      VALUES ('$image', $id, $user_id)";
    if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
  }
}
?>
