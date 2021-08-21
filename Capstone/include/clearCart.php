<?php

if (isset($_POST['clearCart'])) {

    include 'DBConnection.php';

    mysqli_select_db($con, "mydb");
    $stmt     = mysqli_stmt_init($con);
    $userName = $_SESSION['userNameSessionCust'];
    
    $sql = "DELETE FROM ShoppingCart WHERE username =? ";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../cart.php?error=sqlerror");
        exit();
    } else {
        //Do not think you need anything else to be sent because the entire table will be deleted and no new information is added so do not bind params (table still exists)
        mysqli_stmt_bind_param($stmt,"s",$userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        header("Location: ../cart.php?error=removedAll");
        exit();
    }
}

/* Doesn't work
//redirect if button not clicked. 

else if (!isset($_POST['clearCart'])){
header("Location: ../index.php?error=NiceTry");
exit();    
}

*/


?>
