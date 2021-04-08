<?php

$servername = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbname = "website";

$connect = mysqli_connect($servername, $dbUserName, $dbPassword, $dbname);

if(!$connect){
  die("Connection Failed" . mysqli_connect_error());
}
