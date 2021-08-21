<!DOCTYPE html>
<html>
<head>
	 <title> Cart </title>
	
	

 </head>
 
 
<body>

<header>

<h1> Cart </h1>
</header>

<?php $page ='cart'; 
include 'include/menu.php';

if(!isset($_SESSION['userNameSessionCust'])){
    header("Location: signInCust.php?error=CustNotLoggedIn");
    exit();
}



?>
<div id = "cart">
<?php
//error messages
if(isset($_GET['error']))  {
	if ($_GET['error'] == "sqlerror") {
    		echo '<p class="signuperror"><b>SQL error</b></p>';
  	}
	else if ($_GET['error'] == "removed"){
  		echo '<p class="signuperror"><b>Item removed from cart</b></p>';
	}
	else if ($_GET['error'] == "removedAll"){
  		echo '<p class="signuperror"><b>All items removed form cart</b></p>';
	}
	else if ($_GET['error'] == "notenoughstock"){
		echo '<p class="signuperror"><b>Not enough product in stock.  Only '.$_GET['stock'].' remaining for '.$_GET['item'].'.</b></p>';
	}
}
?>
<?php
include 'include/printCartScript.php';

?>
</div>		
</body>
</html>
