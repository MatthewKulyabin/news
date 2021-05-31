<?php
$news = $data['news'];
$images = $data['images'];

$id = $news['id'];
$title = $news['title'];
echo "
  <br>
  <form method='POST' action='/login/change_news' enctype='multipart/form-data'>
    Add new news <br>
    <input type='text' name='title' placeholder='Title...' required />
    <br>
    <input type='file' name='file' required />
    <br>
    <input type='hidden' name='id' value='$id' />
    <input type='submit' value='Change' />
  </form><br>

  <form method='POST' action='/login/add_image' enctype='multipart/form-data'>
    Add new image <br>
    <input type='file' name='file' required />
    <br>
    <input type='hidden' name='id' value='$id' />
    <input type='submit' value='Add' />
  </form><br>
";

echo "<h3>News</h3>";
echo "<table><tr><td>Delete</td><td>Title</td><td>user_id</td><td>section_id</td></tr>";
echo "
  <tr>
    <td>
      <form method='POST' action='/login/delete_news'>
        <input type='submit' value='$news[id]' name='id' />
      </form>
    </td>
    <td>$news[title]</td>
    <td>$news[user_id]</td>
    <td>$news[section_id]</td>
  </tr></table>
  Main_image<br><img src='$news[main_image]' alt='main_image' /><br><br>
  Sub_images<br>
";
foreach ($images as $image) {
  echo "<img src='$image[image]' alt='Sub image' />";
}
?>
