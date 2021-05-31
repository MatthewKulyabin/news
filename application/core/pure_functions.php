<?php
  function getFromTable($mysqli, $query) {
    $arr = [];
    $res = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($res)) {
      array_push($arr, $row);
	  }
    return $arr;
  }

  function changeTable($mysqli, $query) {
    return mysqli_query($mysqli, $query);
  }

  function imageConverting() {
    $name = $_FILES['file']['name'];
    $target_dir = 'upload/';
    $target_file = $target_dir.basename($_FILES['file']['name']);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
      // Convert to base64 
      $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
      $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
      return $image;
    }
  }

  function getStringBetween($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
?>
