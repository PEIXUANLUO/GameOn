<!-- 連接資料庫 -->
<?php $conn = require_once "config.php"; ?>

<!-- delete -->
<?php

if (isset($_FILES['new_image'])) {



    $new_id = $_POST["new_id"];
    $new_name = $_POST["new_name"];
    $new_price = $_POST["new_price"];
    //$_FILES["file"]["tmp_name"]：上傳檔案後的暫存資料夾位置。
    $file = fopen($_FILES["new_image"]["tmp_name"], "r");
    // 讀入圖片檔資料
    $fileContents = fread($file, filesize($_FILES["new_image"]["tmp_name"]));
    //關閉圖片檔
    fclose($file);
    //讀取出來的圖片資料必須使用base64_encode()函數加以編碼：圖片檔案資料編碼


    // if (mysqli_num_rows(mysqli_query($conn, $check)) == 0) {




    $fileContents = base64_encode($fileContents);

    $imgType = $_FILES["new_image"]["type"];
    $sqlimg = "INSERT INTO products (id,name, price,image,imgType) 
    VALUES ('" . $new_id . "','" . $new_name . "','" . $new_price . "','" . $fileContents . "','" . $imgType . "')" or die;
    // $sqlimg = "INSERT INTO products (image)
    //     VALUES('" . $new_image. "')";

    if (mysqli_query($conn, $sqlimg)) {
        header("location:administrator.php");
        exit;
    } else {
        echo "Error creating table: ";
    }
}

if (isset($_POST['delete'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_id = $_POST['product_id'];

    mysqli_query($conn, "DELETE FROM `products` WHERE id = '" . $product_id . "'");
}

if (isset($_POST['edit'])) {
    $product_id = $_POST['product_id'];

    session_start();
    $_SESSION["id"] = $product_id;
    setcookie("id", $product_id);

    header("location:edit.php");
}




//查詢後進行 改 刪除( 未完成) 
if (isset($_POST['delete2'])) {
    $product_name2 = $_POST['product_name2'];
    $product_price2 = $_POST['product_price2'];
    $product_image2 = $_POST['product_image2'];
    $product_id2 = $_POST['product_id2'];

    mysqli_query($conn, "DELETE FROM `products` WHERE id = '" . $product_id2 . "'");
}

if (isset($_POST['edit2'])) {
    $product_id2 = $_POST['product_id2'];

    session_start();
    $_SESSION["id"] = $product_id2;
    setcookie("id", $product_id2);

    header("location:edit.php");
}

// // insert
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['insertForm'])) {
    if (isset($_FILES['new_image'])) {



        $new_id = $_POST["new_id"];
        $new_name = $_POST["new_name"];
        $new_price = $_POST["new_price"];





        //$_FILES["file"]["tmp_name"]：上傳檔案後的暫存資料夾位置。
        $file = fopen($_FILES["new_image"]["tmp_name"], "r");
        // 讀入圖片檔資料
        $fileContents = fread($file, filesize($_FILES["new_image"]["tmp_name"]));
        //關閉圖片檔
        fclose($file);
        //讀取出來的圖片資料必須使用base64_encode()函數加以編碼：圖片檔案資料編碼


        // if (mysqli_num_rows(mysqli_query($conn, $check)) == 0) {




        $fileContents = base64_encode($fileContents);

        $imgType = $_FILES["new_image"]["type"];
        $sqlimg = "INSERT INTO products (id,name, price,image,imgType) 
        VALUES ('" . $new_id . "','" . $new_name . "','" . $new_price . "','" . $fileContents . "','" . $imgType . "')" or die;
        // $sqlimg = "INSERT INTO products (image)
        //     VALUES('" . $new_image. "')";

        if (mysqli_query($conn, $sqlimg)) {
            header("location:administrator.php");
            exit;
        } else {
            echo "Error creating table: ";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrator</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        * {
            background-color: whitesmoke;
            font-family: 'Press Start 2P', cursive;
        }

        .administrator {
            text-align: center;
            padding: 25px;
            text-decoration: underline;
        }



        .search-bar {
            width: 60%;
            height: 50px;
            background-color: white;
            margin-left: 10px;
        }

        */ .search_submit {
            height: 20%;
            width: 200px;
        }

        .insertForm {
            border: 1PX solid black;
            padding: 10px;
            margin: 50px;
            border: 5px double black;
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

        .h2edit_delete {
            margin: 50px;
        }

        .edit_delete {
            border: 1px solid black;
            display: flex;
            overflow: visible;
            margin: 50px;
        }

        .edit_delete_item {
            border: 1px solid black;
            display: inline-block;
            width: 200px;
            height: 350px;
            padding: 10px;
            text-align: center;
        }

        /* form.box {
            border: 1px solid black;
            display: inline-block;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
        } */
    </style>
</head>

<body>
    

    <h1 class="administrator">Administrator</h1>
    <hr>

    <!-- 搜尋 -->
    <form action="" method="post">
         <div class="search">
              <input class="search-bar" type="text" name="search2" id="search" placeholder="Search product name">
              <input class="search_submit" type="submit" value="search" name="search">
            <hr>
            <div class="">



                <?php
                if (isset($_POST["search"])) {
                    if (isset($_POST["search"])) {
                        // '%" . $_POST["search2"] . "%'，模糊搜尋，有包含的都搜
                        $sql_query = "SELECT * FROM products WHERE name LIKE '%" . $_POST["search2"] . "%'";
                        $result = mysqli_query($conn, $sql_query);
                        $num_rows = mysqli_num_rows($result);
                        // !$result，跑失敗，沒有結果。
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error($conn));
                            exit();
                        }


                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {

                ?>
                                <form action="" method="POST" class="box">
                                    <?php

                                    $img = $row["image"];
                                    $logodata = $img;
                                    echo '<img style="width: 100px;height: 100px"  src="data:' . $row['imgType'] . ';charset=utf8;base64,' . $logodata . '" />'; ?>
                                    <P>ID:
                                    <div class="id"><?php echo $row['id']; ?></div>
                                    </P>
                                    <p>NAME:
                                    <div class="name"><?php echo $row['name']; ?></div>
                                    </p>
                                    <p>PRICE:
                                    <div class="price"><?php echo $row['price']; ?></div>
                                    </p>
                                    <input type="hidden" name="product_image2" value="<?php echo base64_encode($$row['image']); ?>">
                                    <input type="hidden" name="product_id2" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="product_name2" value="<?php echo $row['name']; ?>">
                                    <input type="hidden" name="product_price2" value="<?php echo $row['price']; ?>">

                                    <input type="submit" value="edit" name="edit2" class="btn" onclick="return confirm('edit the product?');">
                                    <input type="submit" value="delete" name="delete2" class="btn" onclick="return confirm('delete the product?');">
                                     
            </div>

        </div>

    </form>
<?php
                            }
                        };
                    } else {
                        echo '<label>No results were found</label>';
                    };
                }
?>
</form>

</div>



<br>
<br><br>

<!-- 新增 -->
<div class="">

    <form name="insertForm" method="post" action="" Enctype="multipart/form-data" class="insertForm">
        <h2 style="text-decoration: underline;">insert</h2>
        id：<br>
        <input type="text" name="new_id"><br /><br />
        name：<br>
        <input type="text" name="new_name"><br /><br />
        price:<br>
        <input type="text" name="new_price"><br /><br />
        <br>
        image:<br>
        <input type="File" name="new_image"><br /><br />
        <br>
        <input type="submit" value="submit" name="insert" onclick="return confirm('added successfully');">

    </form>

</div>

<hr>

<!-- 改、刪 -->

<div>
    <h2 class="h2edit_delete" style="text-decoration: underline;">edit&delete</h2>
    <div class="edit_delete">

        <?php
        /*抓資料表 */
        $select_product = mysqli_query($conn, "select * from `products`") or die('query failed');

        /*如果資料表有東西，每個都列出來 */
        if (mysqli_num_rows($select_product) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_product)) {


        ?>

                <form action="" method="POST" class="box">
                    <div class="edit_delete_item">
                        <?php
                        $img = $fetch_product["image"];
                        $logodata = $img;
                        echo '<img style="width: 100px;height: 100px"  src="data:' . $fetch_product['imgType'] . ';charset=utf8;base64,' . $logodata . '" />'; ?>
                        <P>ID:
                        <div class="id"><?php echo $fetch_product['id']; ?></div>
                        </P>
                        <p>NAME:
                        <div class="name"><?php echo $fetch_product['name']; ?></div>
                        </p>
                        <p>PRICE:
                        <div class="price"><?php echo $fetch_product['price']; ?></div>
                        </p>
                        <input type="hidden" name="product_image" value="<?php echo base64_encode($fetch_product['image']); ?>">
                        <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="submit" value="edit" name="edit" class="btn">
                        <input type="submit" value="delete" name="delete" class="btn" onclick="return confirm('delete the product?');">
                    </div>
                </form>



        <?php
            };
        };
        ?>


    </div>
</div>









</body>

</html>