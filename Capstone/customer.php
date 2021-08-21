<!DOCTYPE html>
<html>
<head>
	<title> CUSTOMER </title>
	 <link rel="stylesheet" href="capstone.css">
	
	</head>
	
	
<body>
<header>

<h1> CUSTOMER </h1>
</header>



<?php $page ='customer'; include 'include/menu.php'; ?>
	</br></br>
	
	
	<p>	<b><a id="link" href="signUpsCust.php"> Sign Up </a> </b></p>
	</br>
	<?php
	if(!isset($_SESSION['userNameSessionCust'])){
	echo "<p><b> <a id='link' href='signInCust.php'> Log In </a></b> </p>";
	}
	?>
	

</body>
</html>
