<!DOCTYPE html>
<html>
<head>
	<title> EMPLOYEE </title>
	 
	
	</head>
	
	
<body>
	 <link rel="stylesheet" href="capstone.css">
	
<header>

<h1> EMPLOYEE </h1>
</header>



<?php $page ='employee'; include'include/menu.php'; ?>
	</br></br>
  
	
	
	<p>	<b><a id ="link" href="signUpsEmp.php"> Sign Up </a> </b></p>
	</br>
	<?php
	if(!isset($_SESSION['userNameSessionEmp'])){
	echo "<p><b> <a id='link' href='signInEmp.php'> Log In </a></b> </p>";
	}
	?>




	
	
</body>
</html>
