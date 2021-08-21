<?php
//This file writes the time to the DB server
include 'DBConnection.php';


//Gets var q from other file
$q = $_REQUEST["q"];

//Change q to date
date_default_timezone_set("America/New_York");
$q = date("h:i:sa");

//Selects DB
mysqli_select_db($con,"mydb");

//SQL statement set to var
$sql= "UPDATE LogTime SET Time='".$q."' WHERE Id='1'";
// $result = mysqli_query($con,$sql);

//Lets you know if reccord was updated

if (mysqli_query($con, $sql)) {
  echo "Record updated successfully ";
  echo $q;
} else {
  echo "Error updating record: " . mysqli_error($conn);
  echo $q;
}


mysqli_close($con);
?>
