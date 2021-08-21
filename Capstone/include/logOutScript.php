<?php

session_start(); //star session
session_unset();  // unset var
session_destroy();  //logout

header("Location: ../index.php");  //return to homepage


?>