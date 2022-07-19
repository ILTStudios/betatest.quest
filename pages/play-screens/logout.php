<?php   

session_start();
session_destroy(); 
header("Location: ../loginpage.php"); //to redirect back to "loginpage.php" after logging out
exit();

?>