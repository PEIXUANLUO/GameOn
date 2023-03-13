<?php



if (isset($_POST['edit'])) {

    $edit_id = $_POST["edit_id"];
    $edit_name = $_POST["edit_name"];
    $edit_price = $_POST["edit_price"];

    //$_FILES["file"]["tmp_name"]：上傳檔案後的暫存資料夾位置。
    $file = fopen($_FILES["edit_image"]["tmp_name"], "r");
    // 讀入圖片檔資料
    $fileContents = fread($file, filesize($_FILES["edit_image"]["tmp_name"]));
    //關閉圖片檔
    fclose($file);
    //讀取出來的圖片資料必須使用base64_encode()函數加以編碼：圖片檔案資料編碼






    $fileContents = base64_encode($fileContents);

    $imgType = $_FILES["edit_image"]["type"];



    $conn =  require_once "config.php";
    $edit =  "UPDATE `products` SET `name`='$edit_name',`price`='$edit_price',`image`='$fileContents',`imgType`='$imgType'WHERE id = '$edit_id'";

    // $edit = "UPDATE `products` SET name = '$edit_name'  WHERE id = '$edit_id'";
    // mysqli_query($conn, $edit);
    // $edit2 = "UPDATE `products` SET price = '$edit_price'  WHERE id = '$edit_id'";
    mysqli_query($conn, $edit);





    header("location:administrator.php");
    // header("refresh:3;url=index.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap" rel="stylesheet">


    <style>
        * {
            background-color: whitesmoke;
            font-family: 'Press Start 2P', cursive;
        }

        h1 {
            text-align: center;
            margin: 50px;
        }

        .editForm {
            padding: 10px;
            margin: 50px;
            border: 5px double black;
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

<div class=" ">
    <h1>Edit</h1>

    <?php

    $conn = require_once "config.php";

    $edit_id = $_COOKIE['id'];

    $showdata =  mysqli_query($conn, "select * from `products` where id ='$edit_id'") or die('query failed');

    if (mysqli_num_rows($showdata) > 0) {
        while ($fetch_product = mysqli_fetch_assoc($showdata)) {


    ?>
            <form class="editForm" name="editForm" method="post" action="" Enctype="multipart/form-data">




                id：<br>
                <input type="text" name="edit_id" value="<?php echo $fetch_product['id']; ?>"><br /><br />
                name：<br>
                <input type="text" name="edit_name" value="<?php echo $fetch_product['name']; ?>"><br /><br />
                price:<br>
                <input type="text" name="edit_price" value="<?php echo $fetch_product['price']; ?>"><br /><br />
                <br>
                image:<br>
                <input type="File" name="edit_image" value="<?php /* echo $fetch_product['image']; */ ?>"><br /><br />
                <br>
                <input type="submit" value="edit" name="edit">



            </form>
    <?php
        };
    };
    ?>

</div>

</body>

</html>