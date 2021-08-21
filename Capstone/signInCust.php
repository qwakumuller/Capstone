<html>
<body>
 
  <h1>Customer Sign In</h1>   
  <?php $page ='customerSignIn'; include 'include/menu.php'; ?>
  <br>
  <div id= "error codes">
  <br>
  <?php
  //send back to customer.php if already signed in
  if(isset($_SESSION['userNameSessionCust'])){
    header("Location: customer.php");
    exit();
  }





  //error message codes
  if(isset($_GET['error']))  {
    if ($_GET['error'] == "emptyFields") {
      echo '<p class=signuperror"><b>Fill in all Fields</b></p>';
    }
    if ($_GET['error'] == "locked") {
      echo '<p class=signuperror"><b>Your account has been locked for 15min due to invalid credentials.</b></p>';
    }
    else if ($_GET['error'] == "sqlError"){
      echo '<p class=signuperror"><b>SQL Error</b></p>';
    }
    else if ($_GET['error'] == "noUser"){
        echo '<p class=signuperror"><b>Incorrect username or password</b></p>';
      }
    else if ($_GET['error'] == "wrongPassword"){
        echo '<p class=signuperror"><b>Incorrect username or password</b></p>';
      }
    else if ($_GET['error'] == "success"){
        echo '<p class=signuperror"><b>Logged in sucessfuly </b></p>';
      }
    else if ($_GET['error'] == "custNotLoggedIn"){
        echo '<p class=signuperror"><b>Sign In to Access this Resource </b></p>';
      }
      else if ($_GET['error'] == "custCartLogin"){
        echo '<p class=signuperror"><b>Sign In to add items to your cart</b></p>';
      }
      else if ($_GET['error'] == "CustNotLoggedIn"){
        echo '<p class=signuperror"><b>Sign In to view your cart</b></p>';
      }
    
    
  }
  
  ?>
</div>
    <br>

    <form action="include/signInCustScript.php" id = "signInScriptCust" method = "post">
        
        <label for="username">Username: </label><br>
        <input type="text" id="username" name="username" placeholder="" value=<?php echo $_GET['username'];?>><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="password" placeholder="" ><br>
        <button type="submit" name="signInCustButton">Log In</button>
      </form> 

      <br>
 <!--------------------------------------guest account starting here------------------------------------------------------------------------------------>
 <p>Click guest to proceed as a guest instead </p>
  <form action= "include/signInGuestScript.php" id="guest" method="post">
  <input type="submit" name="guest" id="guest" value="guest"/>
      <br>
      <br>
      <a href = "signUpsCust.php">Click Here to regester instead </a>






</body>
</html>
