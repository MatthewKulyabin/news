<h1>Admin</h1>
<?php
  if ($_SESSION['role'] === "1") {
    // Logout
    echo "<a href='/admin/out'>Log out</a><br><br>";

    echo "
      <form method='POST' action='/admin/add_section'>
        Add new section <br>
        <input type='text' name='title' placeholder='Title' required />
        <br>
        <input type='submit' value='Add' />
      </form><br>
    ";

    echo "<table>Sections<tr><td>Id</td><td>Delete</td><td>Title</td></tr>";
    foreach ($data['sections'] as $key)
    {
      echo "
        <tr>
          <td>
            <form method='POST' action='admin/detail_section'>
              <input type='submit' value='$key[id]' name='id' />
            </form>
          </td>
          <td>
            <form method='POST' action='admin/delete_section'>
              <input type='submit' value='$key[id]' name='id' />
            </form>
          </td>
          <td>$key[title]</td>
        </tr>
      ";
    }

    // News
    echo "<table>News<tr><td>Id</td><td>Delete</td><td>Title</td><td>section_id</td></tr>";
    foreach ($data['news'] as $key)
    {
      echo "
        <tr>
          <td>
            <form method='POST' action='login/detail_news'>
              <input type='submit' value='$key[id]' name='id' />
            </form>
          </td>
          <td>
            <form method='POST' action='login/delete_news'>
              <input type='submit' value='$key[id]' name='id' />
            </form>
          </td>
          <td>$key[title]</td>
          <td>$key[section_id]</td>
        </tr>
      ";
    }

    // Comments
    echo "<table>Comments<tr><td>Delete</td><td>Comment</td><td>news_id</td><td>user_id</td></tr>";
    foreach ($data['comments'] as $key)
    {
      echo "
        <tr>
          <td>
            <form method='POST' action='admin/delete_comment'>
              <input type='submit' value='$key[id]' name='id' />
            </form>
          </td>
          <td>$key[comment]</td>
          <td>$key[news_id]</td>
          <td>$key[user_id]</td>
        </tr>
      ";
    }
  } else {
?>
<form method="post" action="/admin/login">
  Login: <input type="text" name="login" /><br /><br />
  Password: <input type="password" name="password" /> <br /><br />
  <input type="submit" />
</form>
<?php
}
