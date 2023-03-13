<?php


session_start(); 
$_SESSION = array(); 
// session_destroy() 函數徹底終結session
session_destroy(); 
header('location:index.php'); 


?>
