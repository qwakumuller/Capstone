<?php
//This file opens a connection to the DB.  It does not select a DB.
session_start();



//Database credentials
$servername = "aar3h5f408fx56.cvqxozdwxydo.us-east-1.rds.amazonaws.com";
$username = "EconSource2021";
$password = "NewPage2021";

//Opens Connection
$con = mysqli_connect($servername, $username, $password);
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

?>
