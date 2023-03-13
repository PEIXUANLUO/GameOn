<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>會員註冊</title>
    
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap"
        rel="stylesheet">
    <script>

        function validateForm() {
            var x = document.forms["registerForm"]["password"].value;
            var y = document.forms["registerForm"]["password_check"].value;
            if (x.length < 6) {
                alert("密碼長度不足");
                return false;
            }
            if (x != y) {
                alert("請確認密碼是否輸入正確");
                return false;
            }
        }
    </script>

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
        <!-- <h1>註冊頁面</h1> -->
        <form name="registerForm" method="post" action="update2.php" onsubmit="return validateForm()">
            <h1>change password</h1><br>
            UserName：<?php
                                                                    session_start();  //很重要，可以用的變數存在session裡
                                                                    $username = $_SESSION["username"];
                                                                    echo   $_COOKIE['username']  ;

                                                                    ?>
        <br /><br />
            Password：<br>
            <input type="password" name="password" id="password"><br /><br />
            Password_Check：<br>
            <input type="password" name="password_check" id="password_check"><br /><br />
            <br>
            <input type="submit" value="submit" name="submit" class="button ">
          
            <a class="button" href="welcome.php">back</a>

        </form>

    </div>


</body>

</html>
