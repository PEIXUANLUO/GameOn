<!-- config -->
<?php $conn = require_once "config.php"; ?>
<?php
if (isset($_GET['store'])) {
    header('location:store.php');
}

if (isset($_GET['Snake'])) {
    header('location:indexsnakedemo.php');
} ?>



<!doctype html>
<html lang="en">

<head>


    <script src="../_js/bootstrap.bundle.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameOn</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="import" href="navbar.html">



    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="../_css/bootstrap.css">
  <script src="../_js/bootstrap.bundle.js"></script>

  <link rel="stylesheet" href="./style.css"> -->

    <!-- google font -->
    <!-- font game -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap"
        rel="stylesheet">

    <!-- font original -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" href="./img/favicon.ico.png" type="image/x-icon">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>

    <section class="hero">
        <div class="maim-width">

            <header>
                <div class="logo">
                    <h2><a href="./index.html">GameOn</a></h2>
                </div>
                <nav>
                    <ul>
                        <div class="dropdown">
                            <li><a href="#">Games</a></li>
                            <div class="dropdown-content">
                                <a href="../mario/newMario.html">Mario</a>
                                <a href="welcome.php?Snake">Snake</a>
                                <a href="#">Tetris</a>
                            </div>
                        </div>
                        <li> <a href="store.php?store">Store</a></li>





                        <li class=""><a href="../NEW/update.php">
                                <?php
                                // session_start();  //很重要，可以用的變數存在session裡
                                session_start();
                                //$username  沒抓到資料
                                echo "<h1>" . $_COOKIE['username'] . "</h1>";

                                ?>
                            </a></li>
                        <li><a href="../NEW/logout.php">log out</a></li>
                    </ul>
                </nav>
            </header>


            <div class="content">
                <div class="main-text">
                    <h1>FORTNINITE</h1>
                    <P>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type and
                        scrambled it to make a type specimen book. </P>
                    <a href="#">Play Now</a>
                    <a href="#" class="cta"><i class="fa-solid fa-play"></i> Watch GamePlay</a>
                </div>

                <div class="social">
                    <a href="#"><i class="fa-brands fa-windows"></i></a>
                    <a href="#"><i class="fa-brands fa-apple"></i></a>
                    <a href="#"><i class="fa-solid fa-n"></i></a>
                    <a href="#"><i class="fa-brands fa-android"></i></a>
                    <a href="#"><i class="fa-brands fa-playstation"></i></a>
                    <a href="#"><i class="fa-brands fa-xbox"></i></a>
                </div>

                <!-- 圖片 -->
                <div class="image">
                    <img src="../img/gameboy (1).png" class="img">
                </div>



            </div>

        </div>

        <script>
            $(function () {
                $("#navbar-container").load("navbar.html");
            });
        </script>
</body>

</html>