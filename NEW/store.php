<!-- config -->
<?php $conn =  require_once "config.php"; ?>
<!-- add to cart -->
<?php
session_start();


if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    // $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $username = $_COOKIE['username'];

    $select_cart =  "SELECT * FROM cart where name= '$product_name'and username='$username'" or die('query ');
    $result = mysqli_query($conn, $select_cart);
    if (!$result) {
        echo ("Error:" . mysqli_error($conn));
        exit();
    }


    if (mysqli_num_rows($result) > 0) {
        echo $message[] = 'product already added to cart!';
    } else {
        echo "<script>console.log('{$product_name}' );</script>";
        echo "<script>console.log('{$product_price}' );</script>";
        echo "<script>console.log('{$product_quantity}' );</script>";
        $sql = "INSERT INTO cart(name, price, quantity,username) VALUES('" . $product_name . "','" . $product_price . "','" . $product_quantity . "','" . $username . "')" or die('query 456 ');
        mysqli_query($conn, $sql);
        $message[] = 'product added to cart!';
        echo "<script>console.log('傳送成功' );</script>";
    }
}
if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['newid'];
    echo "<script>console.log('{$update_id}' );</script>";
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE newid = '$update_id'");
    $message[] = 'ok!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    echo "<script>console.log('{$update_id}' );</script>";
    mysqli_query($conn, "DELETE FROM `cart` WHERE newid = '$remove_id'");
    header('location:store.php');
}

if (isset($_GET['delete_all'])) {
    $username = $_COOKIE['username'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE username = '" . $username . "'");
    header('location:store.php');
}

if (isset($_GET['buy'])) {

    $username = $_COOKIE['username'];

    $select_cart2 =  " INSERT INTO buyfinish (name ,price,quantity,username )
    SELECT name,price,quantity,username 
    FROM cart where username='$username'" or die('query ');
    mysqli_query($conn, $select_cart2);


 
    mysqli_query($conn, "DELETE FROM `cart` WHERE username = '" . $username . "'");
    header('location:buylist.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">

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
            background: lightgray;
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

        .table {
            border: 1px solid black;
        }


        /*product */
        .products {
            /* border: 10px solid black; */
            display: inline-block;
            width: 1650px;

            overflow: visible;


        }

        .heading {
            margin: 25px;
            text-decoration: underline;
            text-shadow: #979797;
            text-align: center;
        }

        .producttable {
            display: inline-flex;
            /* background-color: gray; */

        }

        .productsbox {
            border: 5px solid black;
            border-radius: 30px;
            padding: 10px;
            margin: 30px;
            display: inline-block;
            background-color: #EFEBE9;
            text-align: center;
            height: 550px;

        }

        img {
            border: 5px double black;
            border-radius: 30px;
            margin: 10px;
        }

        .name {
            padding: 25px 0;
        }

        .price {
            padding: 25px 0;
        }

        .btnquantity {
            margin: 10px;
            padding: 25px 25px 25px 25px;
            width: 250px;
            height: 60px;
            border-radius: 30px;
        }

        input[type=number]:hover::-webkit-inner-spin-button {
            width: 14px;
            height: 45px;
        }


        .btn {
            /* margin: 25px 0; */
            padding: 10px 10px;
            border: 3px solid black;
            border-radius: 10px;
        }


        /*結帳區 */
        .table {
            width: 95%;
            border-radius: 10px;
        }

        table,
        th,
        td {
            border: 1px solid;
            height: 80px;
            text-align: center;
        }

        .cart_number {
            width: 200px;
            height: 30px;
            border-radius: 5px;
            padding: 10px;
        }

        .cart-btn {
            /* font-size: 48px; */
            margin: 50px 0;
        }
    </style>

</head>

<body>
    <section class="hero">
        <div class="maim-width">
            <header>
                <div class="logo">
                    <h2><a href="./welcome.php">GameOn</a></h2>
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
                        <li><a href="">Store</a></li>
                        <li class=""><a href=""> <?php
                                                    // session_start();  //很重要，可以用的變數存在session裡
                                                    //$username  沒抓到資料
                                                    echo "<h1>" . $_COOKIE['username'] . "</h1>";

                                                    /*$username = $_SESSION["username"];
                                                    echo $_SESSION['username'];
                                                    echo "<h1>" . $_SESSION['username'] . "</h1>";*/

                                                    ?></a></li>

                        <li><a href="../NEW/logout.php">log out</a></li>
                    </ul>
                </nav>
            </header>


            <div class="products">



                <?php
                /*抓資料表 */
                $select_product = mysqli_query($conn, "select * from `products`") or die('query failed');

                /*如果資料表有東西，每個都列出來 */
                if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {


                ?>

                        <form action="" method="POST" class="producttable">
                            <div class="productsbox">
                                <?php
                                $img = $fetch_product["image"];
                                $logodata = $img;
                                echo '<img style="height: 250px;"  src="data:' . $fetch_product['imgType'] . ';charset=utf8;base64,' . $logodata . '" />'; ?>

                                <div class="name">Name:<?php echo $fetch_product['name']; ?></div>
                                <div class="price">Price:<?php echo $fetch_product['price']; ?></div>
                                <div>Quantity:<input type="number" min="1" name="product_quantity" value="1" class="btnquantity"></div>
                                <input type="hidden" name="product_image" value="
                            <?php echo base64_encode($fetch_product['image']); ?>">


                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                            </div>



                        </form>
                <?php
                    };
                };
                ?>
            </div>

            <!-- 結帳區 -->
            <div>
                <br>
                <br>
                <br>
                <br>
                <table class="table">
                    <thead>
                        <!-- <th>image</th> -->
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total price</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <?php
                        $username = $_COOKIE['username'];
                        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE username = '$username'") or die('query failed');
                        $grand_total = 0; /* 總額 */
                        if (mysqli_num_rows($cart_query) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                        ?>
                                <tr>
                                    <!--                                
                                    <td><img src="images/ <?php
                                                            $img = $fetch_cart["image"];
                                                            $logodata = $img;
                                                            echo '<img style="width: 100px;"  src="data:' . $fetch_cart['imgType'] . ';charset=utf8;base64,' . $logodata . '" />'; ?>"></td> -->
                                    <td><?php echo $fetch_cart['name']; ?></td>
                                    <td>$<?php echo $fetch_cart['price']; ?>/-</td>
                                    <td>
                                        <form action="" method="post">
                                            <!-- <?php /*echo $fetch_cart['newid']; */ ?> 每筆購物都是一個newid -->
                                            <input type="hidden" name="newid" value="<?php echo $fetch_cart['newid']; ?>">
                                            <input type="number" class="cart_number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                            <input type="submit" name="update_cart" value="update" class="option-btn">
                                        </form>
                                    </td>
                                    <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                                    <!-- ?remove 刪除某列()  -->
                                    <td><a href="store.php?remove=<?php echo $fetch_cart['newid']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
                                </tr>



                        <?php
                                $grand_total += $sub_total;
                            }
                        } else {
                            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                        }
                        ?>
                        <tr class="table-bottom">
                            <td colspan="4">grand total :$<?php echo $grand_total; ?>/-</td>
                            <td> <a href="store.php?buy" onclick="return confirm('buy all from cart?');" class="delete-btn">buy</a><br></td>
                        </tr>


                    </tbody>
                </table>
                <div class="cart-btn">
                    <a href="#" class="btnbtn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a><br>
                </div>


                <div class="cart-btn">
                    <!-- a href="store.php?delete_all"，?get傳送方式，delete_all要做的事(php)-->
                    <!-- ($grand_total > 1) ? '' : 'disabled'; 三原運算子。 $grand_total > 1，條件式。 ' '，條件成立時。 :，or。 'disabled'，另一個選項-->
                    <a href="store.php?delete_all" style="margin-bottom: 500px;" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a>

                </div>


            </div>

            <hr>




        </div>

</body>

</html>