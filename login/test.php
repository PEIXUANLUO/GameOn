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
    <title>Log In</title>
    <!-- google font -->
    <!-- font game -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Press Start 2P', cursive;
        }

        body {
            overflow-x: hidden;
        }

        .maim-width {
            width: 1400px;
            max-width: 75%;
            margin: 0 auto;
        }

        .hero {
            height: 100%;
            width: 100%;
            min-height: 100vh;
            background: radial-gradient(#2b4a74, 20%, #1b1b1b);
            position: relative;
        }

        .hero header .logo h2 a {
            display: block;
            font-size: 32px;
            font-weight: 600;
            text-decoration: none;
            color: white;
        }

        .hero header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px 0 80px;
        }

        nav ul li {
            list-style: none;
            display: inline-block;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            margin-left: 60px;
            font-size: 15px;
            font-weight: 600;
            border-bottom: 2px solid transparent;
            transition: .2s;
        }

        nav ul li:not(:last-child) a:hover,
        nav ul li:not(:last-child) a:focus {
            border-bottom: 2px solid white;
        }

        .dropdown {
            position: relative;
            display: inline-block;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 15px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        .dropdown-content a:hover {
            background-color: rgb(185, 189, 206);
            border-radius: 15px;

        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        nav ul li.btn a {
            background: transparent;
            color: white;
            border: 3px solid rgb(185, 189, 206);
            padding: 9px 20px;
            border-radius: 30px;
            line-height: 1.4;
            font-size: 14px;
            font-weight: 500;
            margin-left: 150px;
        }

        nav ul li.btn:hover a {
            border: 3px solid white;
            color: black;
            background: white;
            transition: .4s;
        }
    </style>
</head>

<body>


    <header>
        <div class="logo">
            <h2><a href="./index.html">GameOn</a></h2>
        </div>
        <nav>
            <ul>
                <div class="dropdown">
                    <li><a href="#">Games</a></li>
                    <div class="dropdown-content">
                        <a href="./mario/newMario.html">Mario</a>
                        <a href="./snake/indexsnakedemo.html">Snake</a>
                        <a href="#">Tetris</a>
                    </div>
                </div>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Faq</a></li>
                <li class="btn"><a href="./login/index.php">Log In</a></li>
            </ul>
        </nav>
    </header>


    <h1>Log In</h1>
    <h2>你可以選擇登入或是註冊帳號~</h2>
    <form method="post" action="login.php">
        帳號：
        <input type="text" name="username"><br /><br />
        密碼：
        <input type="password" name="password"><br><br>
        <input type="submit" value="登入" name="submit"><br><br>
        <a href="register.html">還沒有帳號？現在就註冊！</a>
    </form>
</body>

</html>