<?php

  require_once 'includes/constants.php';

  require_once 'includes/debug.php';

  class Mysql{

    private $conn;

    //creates a connection with the database
    function __construct(){
      $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('Não foi possível conectar com o banco de dados :(');
    }


    //checks if the user input corresponds to one on the database
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
        }

        return false;
      }
    }

    //inserts the user into the database

    function insert_User($r_Uname, $r_Pwd, $r_Email){
 
      //checks if the user is already on the database
      $verify_query = "SELECT *
               FROM users
               WHERE Username = ? OR Email = ?
               LIMIT 1";

      if ($stmt = $this->conn->prepare($verify_query)){

        $stmt->bind_param('ss', $r_Uname, $r_Email);
        $stmt->execute();

        if ($stmt->fetch()){
          $stmt->close();
          echo ("console.log('error :(')");
          return false;  
        }
      }

      //if not, insert it
      $insert_query = "INSERT INTO users (Username, Password, Email) values (?, ?, ?)";         

      if ($stmt = $this->conn->prepare($insert_query)){

        $stmt->bind_param('sss', $r_Uname, $r_Pwd, $r_Email);
        $stmt->execute();

        if ($stmt->fetch()){
          $stmt->close();
          return true;  
        }
        return false;
      }
    }
  }
?>