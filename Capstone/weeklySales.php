<!DOCTYPE html>
<html>
<head>
	 <title> Weekly Sales</title>
	
	

 </head>
 
 


<header>

<h1> Weekly Sales</h1>
</header>

<?php $page ='weeklySales'; include 'include/menu.php';
	
	if(!isset($_SESSION['userNameSessionEmp'])){
    header("Location: signInEmp.php?error=empNotLoggedIn");
    exit();
	}

	
?>


<body>
<div>

<?php
include 'include/weeklySalesScript.php';

?>
</div>
	
</body>
</html>
