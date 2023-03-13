<?php


/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
/*define() 函數定義一個常量。
在設定以後，常量的值無法更改
常量名不需要開頭的美元符號 ($)
作用域不影響對常量的訪問
常量值只能是字符串或數字*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'game');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// 輸入中文也OK的編碼
mysqli_query($link, 'SET NAMES utf8');

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    return $link;
}
?>

<?php

session_start();
// Store data in session variables
$_SESSION["loggedin"] = true;
//這些是之後可以用到的變數
$_SESSION["id"] = mysqli_fetch_assoc($result)["id"];
$_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
// 設COOKIE，記username
setcookie("username", $username);

?>