<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>註冊成功</title>
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
            text-align: center;
        }
        h1{
            color: red;
        }


    </style>
</head>

<body>
    <div class="container">
        <!-- <h1>註冊頁面</h1> -->
        <form name="registerForm" method="post" action="register.php" onsubmit="return validateForm()">
            <h1>Account already used</h1><br>
            <a href="./index.html">Back To the homepage</a>
        </form>

    </div>


</body>

</html>