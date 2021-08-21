<?php
include 'DBConnection.php';

mysqli_select_db($con,"CustomerLogin");

$username = $_POST['username'];
$password = $_POST['password'];

//gets ip address
function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
    $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
    return $ipAddr;
    }



//empty fields error
if (isset($_POST['signInCustButton'])) 
{
    $time=time()-900; // Here you can chnage the attempt lock time. We using 30 here because after 3 failed login attempt, user can't login for 30 second.
    $ip_address=getIpAddr(); // Stores IP address in a variable.

    //sql to get login counts 
    $query=mysqli_query($con,"select count(*) as total_count from loginlogs where TryTime > $time and IpAddress='$ip_address'");
    $check_login_row=mysqli_fetch_assoc($query);
    $total_count=$check_login_row['total_count'];

    //locked account error
    if($total_count==3) {
        header("Location: ../signInCust.php?error=locked");
        exit();
    }







//empty fields error
    if (empty($username)  || empty($password)) 
    {
        header("Location: ../signInCust.php?error=emptyFields&username=".$username."");
        exit();

    }
    else 
    {
        $sql = "SELECT * FROM customers WHERE userName=?";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../signInCust.php?error=sqlError&username=".$username."");
            exit();
        }
       else 
        {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //turns result into array for php
            if ($row = mysqli_fetch_assoc($result)) 
            {
                $passwordCheck = password_verify($password, $row['password']);  //checks password with hash
                if ($passwordCheck == false) 
                {
                    //add reccord on failed login
                    $try_time=time();
                    mysqli_query($con,"insert into loginlogs(IpAddress,TryTime) values('$ip_address','$try_time')");
                    header("Location: ../signInCust.php?error=wrongPassword&username= ".$username."");
                    exit();
                }
                else if($passwordCheck == true) //logs in if sucessful
                {
                    //clears bad logins.  Put after sucess
                    mysqli_query($con,"delete from loginlogs where IpAddress='$ip_address'");

                    //starts session and creates some session var 1:34
                    session_start();
                    $_SESSION['userNameSessionCust'] = $row['userName'];
                    $_SESSION['fNameSessionCust'] = $row['fName'];
                    
                    header("Location: ../index.php?error=success");
                    exit();
                   
                    
                }


            }  
            else 
            {
                //add reccord on failed login
            $try_time=time();
            mysqli_query($con,"insert into loginlogs(IpAddress,TryTime) values('$ip_address','$try_time')");
            header("Location: ../signInCust.php?error=noUser&username=".$username."");
            exit();


            } 

        } 

    }









}
//send back if button not clicked
else 
{
    header("Location: ../signInCust.php");
    exit();
}

?>
