<?php
class Model_Main extends Model
{
	function __construct()
  {
    $this->auth = new AuthClass();
  }

  public function get_data()
	{	
		$data = array();
    $data['sections'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM sections");
		$data['news'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM news;");
		return $data;
	}

	public function get_detail_news($post)
	{
		$id = $post['id'];
		$data = array();
		$data['news'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM news WHERE id=$id")[0];
		$data['images'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM images WHERE news_id=$id");
		$data['comments'] = getFromTable($GLOBALS['mysqli'], "SELECT * FROM comments WHERE news_id=$id");
		return $data;
	}

	public function add_comment($post)
	{
		$id = $post['id'];
		$user_id = $_SESSION['user_id'];
		$comment = $post['comment'];
		$query = "INSERT INTO comments (comment, user_id, news_id) VALUES ('$comment', $user_id, $id)";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
    	echo "Error from post to table";
    } else {
      echo "Success!";
    }
	}
}
?>
