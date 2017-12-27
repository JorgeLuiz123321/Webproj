<?php

  require_once 'includes/constants.php';

  class Mysql{

    private $conn;

    function __construct(){
      $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('Não foi possível conectar com o banco de dados :(');
    }

    function verify_Login_Input($uname, $pwd){

      $query = "SELECT *
               FROM users
               WHERE Username = ? AND Password = ?
               LIMIT 1";

      if ($stmt = $this->conn->prepare($query)){
        
        $stmt->bind_param('ss', $uname, $pwd);
        $stmt->execute();

        if ($stmt->fetch()){
          $stmt->close();
          return true;	
        } else return false;
      }
    }
  }
?>