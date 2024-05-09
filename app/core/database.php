<?php

class Database{

  private function connection(){
    $serverName = "localhost";
    $database = "pos_db";
    $username = "root";
    $password = "";
    try {
      $con = new PDO("mysql:host=$serverName;dbname=$database",$username,$password);
  
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    return $con;
  }


  public  function query($query, $params = []) {
      $con =$this-> connection();

      try {
          $stmt = $con->prepare($query);
          $stmt->execute($params);
          return $stmt;
      } catch (PDOException $e) {
          // Handle exceptions as needed (log, display, etc.)
          echo "Error: " . $e->getMessage();
          return false;
      }
    }

  
}



































