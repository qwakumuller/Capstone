<?php
include 'DBConnection.php';
mysqli_select_db($con, "mydb");


//gets receipt name and creates a session var.  Then sends to viewReceipt.php
$receiptName = $_POST['receiptName'];
$_SESSION['receiptName'] = $receiptName;
header("Location: ../viewReceipt.php");




?>