<html>
<body>

  <h1>Register Customer</h1>   
  <?php $page ='customerSignUp'; include 'include/menu.php'; ?>
  <br>
<div id= "error codes">
  <br>
  <?php
  //error message codes
  if(isset($_GET['error']))  {
    if ($_GET['error'] == "empty") {
      echo '<p class=signuperror"><b>Fill in all Fields</b></p>';
    }
    else if ($_GET['error'] == "invalidEmail"){
      echo '<p class=signuperror"><b>Invalid email</b></p>';
    }
    else if ($_GET['error'] == "passwordCheck"){
      echo '<p class=signuperror"><b>Password and Confirm password do not match</b></p>';
    }
    else if ($_GET['error'] == "sqlError"){
      echo '<p class=signuperror"><b>sql error</b></p>';
    }
    else if ($_GET['error'] == "userTaken"){
      echo '<p class=signuperror"><b>Username is already taken</b></p>';
    }
    else if ($_GET['error'] == "usernameLC"){
      echo '<p class=signuperror"><b>Username Must only be lowercase letters and no spaces</b></p>';
    }
    else if ($_GET['error'] == "badPassword"){
      echo '<p class=signuperror"><b>Password Must have one Captial, one lowercase, one special char (!@#$%^&*) and one number</b></p>';
    }
    else if ($_GET['error'] == "registered"){
      echo '<p class=signuperror"><b>User has been registered</b></p>';
    }
    
  }
  
  ?>
</div>

    <form action="include/regesterCustomerScript.php" id = "regesterCustomerForm" method = "post">
        <label for="fName">First name:</label><br>
        <input type="text" id="fName" name="fName" value=<?php echo $_GET['fName'];?>><br>
        <label for="lName">Last name:</label><br>
        <input type="text" id="lName" name="lName" value=<?php echo $_GET['lName'];?>><br>
        <label for="username">Username (Username must be all lower case and no spaces): </label><br>
        <input type="text" id="username" name="username" placeholder="" value=<?php echo $_GET['username'];?>><br>
        <label for="password">Password (Password must have 1 capital, 1 lower case, 1 number and one special character): </label><br>
        <input type="password" id="password" name="password" placeholder="" ><br>
        <label for="cPassword">Confirm Password: </label><br>
        <input type="password" id="cPassword" name="cPassword" placeholder="" ><br>
        <label for="email">E-mail: </label><br>
        <input type="text" id="email" name="email" value=<?php echo $_GET['email'];?>><br><br>
        <button type="submit" name="registerCustomersButton">Submit</button>
      </form> 

      <br>
      <br>
      <a href = "signInCust.php">Click Here to sign in instead </a>






</body>
</html>
