<h1>Login</h1>

<?php
  if ($_SESSION['is_auth']) {
    echo "<a href='/login/out'>Log Out</a><br>";

    echo "
      <br>
      <form method='POST' action='/login/add_news' enctype='multipart/form-data'>
        Add new news <br>
        <input type='text' name='title' placeholder='Title...' required />
        <br>
        <input type='file' name='file' required />
        <br>
        <select name='section'>
          ";
        foreach ($data['sections'] as $key)
        {
          echo "<option>$key[title] ($key[id])</option>";
        }
        echo "
        </select><br>
        <input type='submit' value='Add' />
      </form><br>
    ";

    echo "<h3>News</h3>";
    foreach ($data['news'] as $key)
    {
      echo "<table><tr><td>Id</td><td>Delete</td><td>Title</td><td>user_id</td><td>section_id</td></tr>";
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
          <td>$key[user_id]</td>
          <td>$key[section_id]</td>
        </tr></table>
        Main_image<br><img src='$key[main_image]' alt='main_image' /><br><br>
      ";
    }
  } else {
?>
<form method="POST" action="/login/login">
  <input type="text" name="login" placeholder="Login" required /><br>
  <input type="password" name="password" placeholder="Password" required ><br>
  <input type="submit" value="Log In" />
</form>
<?php
}
