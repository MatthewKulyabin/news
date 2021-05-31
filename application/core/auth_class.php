<?php
session_start();

class AuthClass
{
  private $_login = 'admin';
  private $_password = 'admin';

  public function isAuth()
  {
    if (isset($_SESSION['is_auth']))
    {
      return $_SESSION['is_auth'];
    }
    return false;
  }

  public function auth($login, $password)
  {
    $users = getFromTable($GLOBALS['mysqli'], "SELECT * FROM users;");
    foreach ($users as $user) {
      if ($user['login'] === $login && $user['password'] === $password) {
        $user = getFromTable($GLOBALS['mysqli'], "SELECT *FROM users WHERE login='$login';")[0];
        $_SESSION['is_auth'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role_id'];
        $_SESSION['login'] = $login;
        return true;
      }
    }
    $_SESSION['is_auth'] = false;
    $_SESSION['login'] = false;
    return false;
  }

  public function getLogin()
  {
    if ($this->isAuth())
    {
      return $_SESSION['login'];
    }
  }

  public function out()
  {
    $_SESSION = array();
    session_destroy();
  }
}
?>
