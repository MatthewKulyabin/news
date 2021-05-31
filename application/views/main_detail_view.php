<?php
$news = $data['news'];
$images = $data['images'];
$comments = $data['comments'];

$id = $news['id'];
$title = $news['title'];

if ($_SESSION['is_auth'])
{
  echo "
  <br>
  <form method='POST' action='/main/add_comment'>
    Add new comment <br>
    <input type='text' name='comment' placeholder='Comment...' required />
    <br>
    <input type='hidden' name='id' value='$id' />
    <input type='submit' value='Add' />
  </form>
";
}

echo "<h3>News</h3>";
echo "<table><tr><td>Title</td><td>user_id</td><td>section_id</td></tr>";
echo "
  <tr>
    <td>$news[title]</td>
    <td>$news[user_id]</td>
    <td>$news[section_id]</td>
  </tr></table>
  Main_image<br><img src='$news[main_image]' alt='main_image' /><br><br>
  Sub_images<br>
";
foreach ($images as $image)
{
  echo "<img src='$image[image]' alt='Sub image' />";
}

echo "<table><h3>Comments</h3><tr><td>Comment</td><td>user_id</td></tr>";
foreach ($comments as $comment)
{
  if ($comment['user_id'] === $news['user_id'])
  {
    echo "<tr><td><b>$comment[comment]</b></td><td>$comment[user_id]</td></tr>";
  }
  else
  {
    echo "<tr><td>$comment[comment]</td><td>$comment[user_id]</td></tr>";
  }
}
?>
