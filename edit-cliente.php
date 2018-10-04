<?php
include('connection.php');
$db = new DB();

$postdata = file_get_contents("php://input");
$all_posts = json_decode($postdata, true);

  $result = $db->sqlToJson("update clients set
  name= '".$all_posts['name']."',
  tel= '".$all_posts['tel']."',
  email= '".$all_posts['email']."',
  obs= '".$all_posts['obs']."',
  deleted = false
  where id = ". $all_posts['id']);
  echo $result;

?>
