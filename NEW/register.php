<?php


$conn=require_once("config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    //檢查帳號是否重複
    $check="SELECT * FROM userinfo WHERE username='".$username."'";
    // mysqli_num_rows() 函数返回结果，集中行的数量
    // mysqli_query() 函数执行某个针对数据库的查询
    // connection，规定要使用的 MySQL 连接。query，规定查询字符串。
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO userinfo (id,username, password)
            VALUES(NULL,'".$username."','".$password."')";
        
        if(mysqli_query($conn, $sql)){
            header("location:successful.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        header("location:fail.php");
        //header("refresh:3;url=register.html",true);
        exit;
    }
}


mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.html';
    </script>"; 
    
    return false;
} 

?>