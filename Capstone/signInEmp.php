<html>
<body>

  <h1>Employee Sign In</h1>   
  <?php $page ='employeeSignIn'; include 'include/menu.php'; ?>
  <br>
  <div id= "error codes">
  <br>
  <?php
  //send back to employee.php if already signed in
  if(isset($_SESSION['userNameSessionEmp'])){
    header("Location: employee.php");
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
    else if ($_GET['error'] == "empNotLoggedIn"){
        echo '<p class=signuperror"><b>Sign In to Access this Resource </b></p>';
      }
    
    
  }
  
  ?>
</div>
    <br>

    <form action="include/signInEmpScript.php" id = "signInScriptEmp" method = "post">
        
        <label for="username">Username: </label><br>
        <input type="text" id="username" name="username" placeholder="" value=<?php echo $_GET['username'];?>><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="password" placeholder="" ><br>
        <button type="submit" name="signInEmpButton">Log In</button>
      </form> 

      <br>
      <br>
      <a href = "signUpsEmp.php">Click Here to regester instead </a>






</body>
</html>

