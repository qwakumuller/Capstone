<?php
include 'DBConnection.php';
session_start();
mysqli_select_db($con,"CustomerLogin.Guest");

$_SESSION['userNameSessionCust'] = "guest";

header("Location: ../index.php?error=success");
exit();

?>

