<?php 
//This file gets the time from the DB ser

include 'DBConnection.php';

//Gets var q from other file
$q = intval($_GET['q']);


//Selects DB
mysqli_select_db($con,"mydb");

//SQL statement set to var
$sql="SELECT * FROM LogTime WHERE Id ='1'";
$result = mysqli_query($con,$sql);

//Print Row
while($row = $result->fetch_assoc()) {
    echo "Last time button hit " . $row["Time"]. "<br>";
  }
mysqli_close($con);
?>

