<!-- 連接資料庫 -->
<?php

$conn = require "config.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset( $_FILES['new_image'] ) ){



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
     
        $imgType=$_FILES["new_image"]["type"];
        $sqlimg="INSERT INTO products (id,name, price,image,imgType) 
        VALUES ('" . $new_id . "','" . $new_name . "','" . $new_price . "','" .$fileContents."','" .$imgType."')" or die;
        // $sqlimg = "INSERT INTO products (image)
        //     VALUES('" . $new_image. "')";

        if (mysqli_query($conn, $sqlimg)) {
            exit;
        } else {
            echo "Error creating table: ";
        }
    
}
else {
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
    <title>Document</title>
    <!-- <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style> -->
</head>

<body>

    <div class="">


        <form name="insertForm" method="post" action="insert.php" Enctype="multipart/form-data" style="border: 1PX solid black;">
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
            <input type="submit" value="submit" name="insert">

        </form>

    </div>

</body>

</html>