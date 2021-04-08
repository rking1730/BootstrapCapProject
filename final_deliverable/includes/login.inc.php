<?php

//Check to make sure that the user got into this file via the signup page. If they didn't send them back to the home page
if(isset($_POST["login"])){

  //Get the form contents
  $user_id = $_POST['user_id'];
  $password = $_POST['password'];
  //reminder that the database is called $connect

  //Connect to the database
  require_once 'dbh.inc.php';

  //Handle errors
  require_once 'functions.inc.php';

  //check if one any of the fields is blank
  if(emptyInputLogin($user_id, $password)){
    header("location: ../login.php?error=emptyinputlogin");
    exit();
  }

  //login the user if there are no errors
  loginUser($connect, $user_id, $password);
}

else{
  header("location: index.php");
  exit();
}
