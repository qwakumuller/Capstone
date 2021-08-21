<?php

if (isset($_POST['registerCustomersButton'])) {

include 'DBConnection.php';
mysqli_select_db($con,"CustomerLogin");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cPassword = $_POST['cPassword'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];



$lowerCheck = $uperCheck = $specialCheck = $numCheck = false;

if (preg_match("/[a-z]/",$password ))
{
	$lowerCheck = true;
}
if (preg_match("/[A-Z]/",$password))
{
	$upperCheck = true;
}
if (preg_match("/[!@#$%^&*]/",$password))
{
	$specialCheck = true;
}
if (preg_match("/[0-9]/",$password))
{
	$numCheck = true;
}


//sends info back to form if empty fields
if (empty($username) ||empty($email) || empty($password) || empty($cPassword) || empty($fName) || empty($lName)){
    header("Location: ../signUpsCust.php?error=empty&username= ".$username."&email=".$email."&fName=".$fName."&lName=".$lName."");
    exit();

}                
//validate email 48:25 in video
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signUpsCust.php?error=invalidEmail&username= ".$username."&fName=".$fName."&lName=".$lName."");
    exit();
}  //all lowercase username.   ^ anything that is not
if (preg_match("/[^a-z]/",$username)) {  //checks if non lowercase username
    header("Location: ../signUpsCust.php?error=usernameLC&username= ".$username."&email=".$email."&fName=".$fName."&lName=".$lName."");
    exit();
}




//Does confirm password match password
else if ($password !== $cPassword) {
    header("Location: ../signUpsCust.php?error=passwordCheck&username= ".$username."&email=".$email."&fName=".$fName."&lName=".$lName."");
    exit();
}
//validate password
else if ($lowerCheck == false || $upperCheck == false || $specialCheck == false || $numCheck == false){
    header("Location: ../signUpsCust.php?error=badPassword&username= ".$username."&email=".$email."&fName=".$fName."&lName=".$lName."");
    exit();
}





// Check if username already exists  59:30
else {
    $sql = "SELECT userName FROM customers WHERE userName=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {  //prepares sql statment
        header("Location: ../signUpsCust.php?error=sqlError&username= ".$username."&email=".$email."&fName=".$fName."&lName=".$lName."");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$username);  //binds parameters to stament.  
        mysqli_stmt_execute($stmt);  //runs statment
        mysqli_stmt_store_result($stmt);  //stores result backinto $stmt var
        $resultCheck = mysqli_stmt_num_rows($stmt);  //number of rows returned
        if ($resultCheck > 0) {
            header("Location: ../signUpsCust.php?error=userTaken&username= ".$username."&email=".$email."&fName=".$fName."&lName=".$lName."");
            exit();
        }
        else {  //add to DB
            $sql = "INSERT INTO customers (userName, password, fName, lName,email) VALUES (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {  //prepares sql statment
                header("Location: ../signUpsCust.php?error=sqlError&username= ".$username."&email=".$email."&fName=".$fName."&lName=".$lName."");
                exit();
            }
            else {
            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);   //hases password

            mysqli_stmt_bind_param($stmt,"sssss",$username, $hasedPassword, $fName, $lName, $email);  //binds parameters to stament.  
            mysqli_stmt_execute($stmt);  //runs statment
            header("Location: ../signUpsCust.php?error=registered");
            exit();
            
            }
            

        }

    }

}
mysqli_stmt_close($stmt);
mysqli_close($con);

}
//send back to signup page if you didn't hit the signin button
else {
    header("Location: ../signUpsCust.php");
    exit();

}

mysqli_close($con); 
?>
