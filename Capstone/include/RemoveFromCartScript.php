<?php



//Remove from Cart
if (isset($_POST['removeFromCart']))
{
    include 'DBConnection.php';
    mysqli_select_db($con, "mydb");
    $userName = $_SESSION['userNameSessionCust'];

    $itemID = $_POST['itemid']; //this accesses the hidden variable on printCartScript.php so you can access the itemID each iteration of the loop
    $sql = "DELETE FROM ShoppingCart WHERE username=? and itemID=?";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../cart.php?error=sqlerror");
        exit();
    }
    else
    {
        //Do not think you need anything else to be sent because the entire row will be deleted from the table and no new information is added so do not bind params
        mysqli_stmt_bind_param($stmt,"ss",$userName,$itemID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con); 
        header("Location: ../cart.php?error=removed");
        exit();
    }
}

//This redirect doesn't work and IDK why.  It seems to always trigger
/*
//not logged in reidrect
else if (!isset($_POST['removeFromCart'])) {
    header("Location: ../index.php?error=NiceTry");
    exit();    
    }
*/

?>
