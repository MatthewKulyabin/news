<?php
$id = $data['id'];
$title = $data['title'];
echo "
<br>
  <form method='POST' action='/admin/change_section'>
    Change $title<br>
    <input type='text' name='title' placeholder='Title' required />
    <br>
    <input type='hidden' name='id' value='$id' />
    <input type='submit' value='Change' />
  </form><br>
";

echo "<table>Sections<tr><td>Delete</td><td>Title</td></tr>";
echo "
  <tr>
    <td>
      <form method='POST' action='/admin/delete_section'>
        <input type='submit' value='$data[id]' name='id' />
      </form>
    </td>
    <td>$data[title]</td>
  </tr>
";
?>
