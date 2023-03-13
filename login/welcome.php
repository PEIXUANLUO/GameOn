<?php


session_start();  //很重要，可以用的變數存在session裡
$username=$_SESSION["username"];

//$username  沒抓到資料
echo "<h1>你好 ".$_COOKIE['username']."</h1>";

echo "<a href='logout.php'>登出</a>";
    

?>


