<?php

  require_once 'Mysql.php';

  class Membership {

    function validate_User($uname, $pwd){
      $mysql = new Mysql();
      $verification = $mysql->verify_Login_Input($uname, md5($pwd));

      if($verification){
      	$_SESSION['status'] = 'validado';
      	return true;
      } else return false;
    }

    function log_Out(){
      if(isset($_SESSION['status'])){
        unset($_SESSION['status']);

        if(isset($_COOKIE[session_name()])){
          setcookie(session_name(), '', time() - 1000);
          session_destroy();
        }
      }
    }
  }
?>