<?php
class database
{
public $host=DB_HOST;
public $user=DB_USER;
public $pass=DB_PASS;
public $db_name=DB_NAME;
public $link;
public $error;

public function __construct()
{
  $this->connect();
}
private function connect()
{
$this->link=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
if(!$this->link){
      $this->error="Connection Failed:".$this->link->connect_error;
      return false;
    }
}
//Select a query
  public function select($query){
    $result=$this->link->query($query) or die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  }else{
    return false;
  }
}
//Insert query
public function insert($query){
  $insert_row=$this->link->query($query) or die($this->link->error.__LINE__);
  //Validate insert
  if($insert_row){
    header("Location:index.php?msg=".urlencode('Record Added'));
    exit();
  }else{
    die('Error:('.$this->link->errno.')'.$this->link->error);
  }
}
//Update query
public function update($query){
  $update_row=$this->link->query($query) or die($this->link->error.__LINE__);
  //Validate insert
  if($update_row){
    header("Location:index.php?msg=".urlencode('Record Updated'));
    exit();
  }else{
    die('Error:('.$this->link->errno.')'.$this->link->error);
  }
}
//Delete query
public function delete($query){
  $delete_row=$this->link->query($query) or die($this->link->error.__LINE__);
  //Validate delete
  if($delete_row){
    header("Location:index.php?msg=".urlencode('Record Deleted'));
    exit();
  }else{
    die('Error:('.$this->link->errno.')'.$this->link->error);
  }
}

}

 ?>
