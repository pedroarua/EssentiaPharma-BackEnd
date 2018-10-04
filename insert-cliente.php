<?php
include('connection.php');
$db = new DB();

  $db->sqlToJson('insert into clients (deleted) values (true)');

  $result = $db->selectToJson('select * from clients order by id desc limit 1');

  echo $result;

?>
