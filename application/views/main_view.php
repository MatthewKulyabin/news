<h1>Main</h1>

<?php
  $sections = $data['sections'];
  $news = $data['news'];
  
  foreach ($sections as $section) 
  {
    echo "<h2>Section: $section[title]</h2>";
    echo "<h4>News</h4>";
    foreach ($news as $key)
    {
      if ($key['section_id'] == $section['id'])
      {
        echo "<table><tr><td>Id</td><td>Title</td><td>user</td></tr>";
        echo "
          <tr>
            <td>
              <form method='POST' action='main/detail_news'>
                <input type='submit' value='$key[id]' name='id' />
              </form>
            </td>
            <td>$key[title]</td>
            <td>$key[user_id]</td>
          </tr></table>
          Main_image<br><img src='$key[main_image]' alt='main_image' /><br><br>
        ";
      }
    }
  }
?>
