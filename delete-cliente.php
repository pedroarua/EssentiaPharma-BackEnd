<?php
include('connection.php');
$db = new DB();

$postdata = file_get_contents("php://input");
$all_posts = json_decode($postdata, true);

  $result = $db->sqlToJson('update clients set deleted = true where id = '. $all_posts['id']);
  echo $result;

?>
