<!-- config -->
<?php $conn = require_once "config.php"; ?>
<!-- session -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->

    <!-- google font -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet"> -->

    <!-- css -->
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
            background: #979797;
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
                                <a href="../snake/indexsnakedemo.html">Snake</a>
                                <a href="#">Tetris</a>
                            </div>
                        </div>
                        <li><a href="../store/index.php">Store</a></li>




                        <li class=""><a href="../NEW/update.php"><?php
                                                                    session_start();  //很重要，可以用的變數存在session裡
                                                                    // $username = $_SESSION["username"];

                                                                    //$username  沒抓到資料
                                                                    echo "<h1>" . $_COOKIE['username'] . "</h1>";

                                                                    ?></a></li>
                        <li><a href="../NEW/logout.php">log out</a></li>
                    </ul>
                </nav>
            </header>



            <div class="products">

                <h1 class="heading">latest products</h1>

                <?php
                /*抓資料表 */
                $select_product = mysqli_query($conn, "select * from `products`") or die('query failed');

                $row = $select_product->fetch_assoc();
                $image = $row['image'];

                $mine_type = (new finfo(FILEINFO_MIME_TYPE))->buffer($image);
                $image = base64_encode($image);
                $src = "data:$mine_type;base64,$image";

                /*如果資料表有東西，每個都列出來 */
                if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {


                ?>
                        <form action="" method="POST" class="box">
                            <img style="width: 100px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($fetch_product['image']); ?>" />
                            <div class="name"><?php echo $fetch_product['name']; ?></div>
                            <div class="price"><?php echo $fetch_product['price']; ?></div>
                            <input type="unmber" min="1" name="product_quantity" value="1">
                            <input type="hidden" name="product_image" value="<?php echo base64_encode($fetch_product['image']); ?>">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <input type="submit" value="add to cart" name="add_tp_cart" class="btn">
                        </form>
                <?php
                    };
                };
                ?>
            </div>

        </div>
</body>

</html>