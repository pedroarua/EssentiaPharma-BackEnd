<?php
include('connection.php');

if ($_FILES['image']){
  $path = $_FILES['image']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);

  $id = $_GET["id"];

  $newName = "$id.$ext";

  $dir = 'fotos/';
  $files = glob("{$dir}{$id}.*");
  var_dump($files);

  if (count($files) > 0){
    unlink($files[0]);
  }
  if (move_uploaded_file($_FILES["image"]["tmp_name"], "$dir$newName")){
    $db = new DB();
    $result = $db->sqlToJson("update clients set photo = '$newName' where id = $id");

    $json = new stdClass();
    $json->file = $newName;
    echo json_encode($json);
  }
}
else{
  echo "status:nofile";
}


?>
