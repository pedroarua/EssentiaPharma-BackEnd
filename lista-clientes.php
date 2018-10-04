<?php
include('connection.php');
$db = new DB();
for ($i=0;$i<100000000;$i++){

}
  $result = $db->selectToJson('select * from clients where not deleted');
  echo $result;

?>
