<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}


?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>登入介面index.php</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: rgb(205, 196, 182);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        form {
            border: 5px solid black;
            padding: 50px;
            border-radius: 30px;
            font-family: 'Press Start 2P', cursive;
        }

        input {
            border: 3px solid black;
            border-radius: 5px;
            font-family: 'Press Start 2P', cursive;
        }

        .button {

            border: 3px solid black;
            border-radius: 10px;
            padding: 5px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 0px;
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</head>

<body>
    <div class="container">

        <form method="post" action="login.php">
            <h1>Log In</h1><br>
            UserName：<br>
            <input type="text" name="username"><br /><br />
            Password：<br>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Log In" name="submit" class="button "><br><br>
            <a href="register.html">register</a>
        </form>


    </div>

</body>

</html>