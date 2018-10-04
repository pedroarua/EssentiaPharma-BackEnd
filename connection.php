<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class DB{
  protected $username = 'root';
  protected $password = 'Root@123';
  protected $db = 'EssentiaPharma';
  protected $server = 'localhost';
  protected $conn;

  public function connect(){
    $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
    if (!$this->conn) {
        return false;
    }
    else{
      return true;
    }
  }

  public function disconnect(){
    $this->conn->close();
  }

  public function selectToJson($sql){
    $this->connect();

    try {
      $result = $this->conn->query($sql);
      if ($result){
        $json = $result->fetch_all(MYSQLI_ASSOC);
      }
      else {
        $json = new stdClass();
        $json->status = 'sql sintax error';
      }
    } catch (\Exception $e) {
      $json = new stdClass();
      $json->status = 'sql sintax error';
    } finally {
      $this->disconnect();
      return json_encode($json);
    }
  }
  public function sqlToJson($sql){
    $this->connect();
    $json = new stdClass();

    try {
      $result = $this->conn->query($sql);
      if ($result){
        $json->status = 'ok';
      }
    } catch (\Exception $e) {
      $json->status = 'sql sintax error';
    } finally {
      $this->disconnect();
      return json_encode($json);
    }
  }
}

?>
