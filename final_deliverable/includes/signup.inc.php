<?php
//Check to make sure that the user got into this file via the signup page. If they didn't send them back to the home page
if(isset($_POST["createAcct"])){

  //Get the form contents
  $user_id = $_POST['user_id'];
  $password = $_POST['password'];
  $passwordCfrm = $_POST['passwordCfrm'];
  //reminder that the database is called $connect

  //Connect to the database
  require_once 'dbh.inc.php';

  //Handle errors
  require_once 'functions.inc.php';

//check if any of the inputs were left blank
  if(emptyInputSignup($user_id, $password, $passwordCfrm) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
  }

//check if the username is greater than 25 characters
  if(invalidUID($user_id) !== false){
    header("location: ../signup.php?error=invalidUID");
    exit();
  }

//check if the password inputs match
  if(pwdMatch($password, $passwordCfrm) !== false){
    header("location: ../signup.php?error=pwdmismatch");
    exit();
  }

//check if the username is already taken
  if(uidExists($connect, $user_id) !== false){
    header("location: ../signup.php?error=uidexists");
    exit();
  }

//The user doesn't have any errors. Create their account.
  createUser($connect, $user_id, $password);
}

else{
  header("location: index.php");
  exit();
}
