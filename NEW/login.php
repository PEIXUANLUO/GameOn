<?php

//連接資料庫
$conn = require_once "config.php";

// Define variables and initialize with empty values
$username = $_POST["username"];
$password = $_POST["password"];


/* if(isset($_POST['submit'])){

$username=$_POST["username"];
$password=$_POST["password"];

   $select = mysqli_query($conn, "SELECT * FROM `userinfo` WHERE username = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}
 */


//增加hash可以提高安全性
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "SELECT * FROM userinfo WHERE username ='$username'";
$result = mysqli_query($conn, $sql);
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  == 比對 ， 123456789數字，也可以設定成''字串。
    if($username == 123456789 )  {
        header("location:administrator.php");
    } 
   



   elseif(mysqli_num_rows($result) == 1 && $password == mysqli_fetch_assoc($result)["password"]) {
        session_start();
        // Store data in session variables
        // $_SESSION["loggedin"] = true;
        //這些是之後可以用到的變數
        $_SESSION["id"] = mysqli_fetch_assoc($result)["id"];
        $_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
        // 設COOKIE，記username
        setcookie("username", $username);
        /*        $_SESSION['user_id'] = $row['id'];*/

        header("location:welcome.php");
    }else{
        function_alert("account or password incorrect");
    }
   
} 
else {
    function_alert("connect wrong");
}
// echo "<script>console.log('{$username}' );</script>";
// Close connection
mysqli_close($link);

function function_alert($message)
{

    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.html';
    </script>";
    return false;
}
