<!DOCTYPE html>
<html>
<head>
	 <title> Catalog </title>
	
	

 </head>
 
 
<body>

<header>

<h1> Catalog </h1>
</header>

<?php 
$page ='catlog'; 
include 'include/menu.php'; 	

//error codes

if(isset($_GET['error']))  {
    if ($_GET['error'] == "sqlerror") {
      echo '<p class="signuperror"><b>SQL error</b></p>';
    }
	else if ($_GET['error'] == "inCart"){
		echo '<p class="signuperror"><b>This item is already in your cart</b></p>';
	}
	else if ($_GET['error'] == "added"){
		echo '<p class="signuperror"><b>This item was added to cart</b></p>';
	}
	else if ($_GET['error'] == "removed all"){
		echo '<p class="signuperror"><b>Your cart was cleared</b></p>';
	}
	else if ($_GET['error'] == "removed"){
		echo '<p class="signuperror"><b>Item was removed</b></p>';
	}
	else if ($_GET['error'] == "notenoughstock"){
		echo '<p class="signuperror"><b>Not enough product in stock.  Only '.$_GET['stock'].' remaining for '.$_GET['item'].'.</b></p>';
	}
    
}


?>
	
<div id = "show">
<?php
include 'include/catlogScript.php';
?>
</div>
		
</body>
</html>
