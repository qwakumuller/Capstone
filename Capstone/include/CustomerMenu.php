<?php
session_start();
?>

<!DOCTYPE html>
<html>
 <style>
  ul {
  list-style-type: none;
  margin:0;
  padding: 0;
  top:0;
 
  
  
  
  
}

li a {
display: block;
            text-decoration: none;
            border-top: 2px solid #ffffff;
            padding: 5px 10px 5px 10px;
            background: black;
            margin-left: 2px;
            white-space: nowrap;
	position:relative;
  float: left;
  width: 8%;
	color: white;
  
  
  
}

/*li a.active {
  background-color: #4CAF50;
  color: #e64d19;
}
	 */
	 
  
  </style>
  <head>
  <link rel="stylesheet" href="capstone.css"> 
	<script src="js/jquery-3.4.1.js"></script>

  </head>

<!-- Menu.  Will  set class to active if page var is equal.  Should create page var on each new page --> 

<nav>
<div>
<ul>
  <li class="<?php if($page=='home'){echo 'active';}?>"><a href="index.php"> Home </a></li>
  <li class="<?php if($page=='faq'){echo 'active';}?>"><a href="faq.php"> FAQ </a></li>
  <li class="<?php if($page=='contactUs'){echo 'active';}?>"><a href="contactUs.php"> Contact Us </a></li>
  <li class="<?php if($page=='catlog'){echo 'active';}?>"><a href="catlog.php"> Catalog </a></li>
  <li class="<?php if($page=='products'){echo 'active';}?>"><a href="products.php"> Products </a></li>
  <li class="<?php if($page=='time'){echo 'active';}?>"><a href="time.php"> Time Buttons </a></li>
  <li class="<?php if($page=='cart'){echo 'active';}?>"><a href="cart.php"> Cart </a></li>
  <li class="<?php if($page=='customer'){echo 'active';}?>"><a href="customer.php"> Customer </a></li>
  
  
	//these two lines i think are doing the same thing? why does it matter what the session is if you send both to the same script. Recommend changing to an || including both types
  <?php if(isset($_SESSION['userNameSessionEmp'])){
  echo"<li><form action='include/logOutScript.php'><button type='submit'>Log Out</button></form></li>";
  }
  if(isset($_SESSION['userNameSessionCust']) && !isset($_SESSION['userNameSessionEmp'])){
    echo"<li><form action='include/logOutScript.php'><button type='submit'>Log Out</button></form></li>";
    }


  ?>
  <?php
  if (isset($_SESSION['userNameSessionEmp']))
  echo "<li>Welcome ".$_SESSION['fNameSessionEmp']."  </li>";
  if (isset($_SESSION['userNameSessionCust']) && !isset($_SESSION['userNameSessionEmp']))
  echo "<li>Welcome ".$_SESSION['fNameSessionCust']."  </li>";



  ?>


</ul>
	</br>
</div>
</nav>

</html>




