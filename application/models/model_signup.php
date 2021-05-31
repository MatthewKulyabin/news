<?php
class Model_Signup extends Model
{
	function __construct()
  {
    $this->auth = new AuthClass();
  }

  public function registrate($post)
  {
    $login = $post['login'];
    $password = $post['password'];
    $users = getFromTable($GLOBALS['mysqli'], "SELECT * FROM users;");
    foreach ($users as $row) {
      if ($row['login'] === $login) return;
    }
		$query = "INSERT INTO users (login, password, role_id) VALUES('$login', '$password', 2)";
		if (!changeTable($GLOBALS['mysqli'], $query)) {
      echo "Error from post to table";
    } else {
      echo "Success!";
    }
  }
}
?>
