<?php

$conn=require_once("config.php");
    //設定變數接收值
    
    $p_username = $_COOKIE['username'] ;
    $p_password = $_POST["password"];


    // $servername = "localhost";
    // $username = "member";
    // $password = "123456";
    // $dbname = "member";


    //更新資料使用變數
    $sql = "UPDATE userinfo 
    SET  password = '$p_password'
    WHERE username = '$p_username'";

    //判斷如果值有內容才可以更新
    if($p_password != ""){
        //判斷更新資料有沒有成功
        if(mysqli_query($conn, $sql)){
            //echo "更新成功";
            echo "<script>alert('update completed'); location.href = 'welcome.php';</script>";
        }else{
            // echo "更新失敗".mysqli_error($conn);
            echo "<script>alert('update failed'.mysqli_error($conn)); location.href = 'update.php';</script>";
        }
    }else{
        echo "資料更新不能空白。";
    }

    mysqli_close($conn);
?>