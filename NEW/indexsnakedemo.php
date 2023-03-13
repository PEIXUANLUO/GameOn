<!-- config -->
<?php $conn =  require_once "config.php"; ?>
<?php
    // session_start(); 
    // $username = $_COOKIE['username'];
    // $result  = mysqli_query($conn,  "SELECT name FROM buyfinish where username='$username'" );
    // $gamemode='gamemode';
    // $gamemode2='gamemode2';
    // $gamemode3='gamemode3';

    // /*如果資料表有東西，每個都列出來 */
    // if (mysqli_num_rows($result) > 0) {
    //     while ($row_result = mysqli_fetch_array( $result )) {


    //     echo "//寫不出來【".$fetch_product['name']."】<=該質代表會跑出來的按鈕/";
     
    //         // $SelectValue .= $row_result[0] . ",";
    //         // $cut = preg_split("/(-)/", $row_result[1]);

    //         // echo  var_dump($var)

    //         // $YYYYMM = "";
    //         // if((int)$cut[1] < 10){
    //         //     $YYYYMM = $cut[0] . '-0' . $cut[1];
    //         // }else{
    //         //     $YYYYMM = $cut[0] . '-' . $cut[1];
    //         // }

    
            
            
            
            
            
   
    //     }
       
    //     ;
    // };

    // ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNAKE</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Press+Start+2P&display=swap"
        rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            /* box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden; */
        }

        /* body {
            overflow-x: hidden;
        } */

        .hero {
            height: 100%;
            width: 100%;
            /* min-height: 80vh; */
            background-color: rgb(122, 162, 90);
            ;
            position: absolute;
        }

        .maim-width {
            width: 1400px;
            max-width: 75%;
            margin: 0 auto;
        }

        .hero header .logo h2 a {
            display: block;
            font-size: 32px;
            font-weight: 600;
            text-decoration: none;
            color: rgb(0, 0, 0);
            font-family: 'Permanent Marker', cursive;
            font-family: 'Press Start 2P', cursive;
        }

        .hero header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px 0 30px;

        }

        nav ul li {
            list-style: none;
            display: inline-block;

        }

        nav ul li a {
            text-decoration: none;
            color: rgb(0, 0, 0);
            margin-left: 60px;
            font-size: 15px;
            font-weight: 600;
            border-bottom: 2px solid transparent;
            transition: .2s;
            font-family: 'Permanent Marker', cursive;
            font-family: 'Press Start 2P', cursive;
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
            background-color: #ffffff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 15px;
            
        }

        .dropdown-content a {
            color: rgb(0, 0, 0);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-family: 'Permanent Marker', cursive;
            font-family: 'Press Start 2P', cursive;

        }

        .dropdown-content a:hover {
            background-color: rgb(127, 152, 125);
            border-radius: 15px;

        }

        .dropdown:hover .dropdown-content {
            display: block;
        }




        nav ul li.btn a {
            background: transparent;
            color: rgb(0, 0, 0);
            border: 2px solid #000000;
            padding: 9px 20px;
            border-radius: 30px;
            line-height: 1.4;
            font-size: 14px;
            font-weight: 500;
            margin-left: 150px;
        }

        nav ul li.btn:hover a {
            border: 1px solid rgb(0, 0, 0);
            color: rgb(255, 255, 255);
            background: rgb(0, 0, 0);
            transition: .4s;
        }



        .maim-width {
            width: 1400px;
            max-width: 75%;
            margin: auto;
        }

        .name {
            font-size: 75px;
            color: black;
            font-family: 'Permanent Marker', cursive;
            font-family: 'Press Start 2P', cursive;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 30px;
            letter-spacing: 50px;

        }

        .snakelogo {
            margin-top: 10px;
            text-align: center;
        }





        .遊戲開始 {
            font-family: 'Press Start 2P', cursive;
            font-size: 24px;
            background: rgb(95, 95, 95);
            border-radius: 15px;
            border: 5px solid rgb(52, 52, 52);

        }

        .level {
            width: 100%;
            text-align: center;
            font-size: 24px;
            padding: 50px;
            margin: 10px;
            margin-bottom: 15px;
        }

        .level {
            list-style: none;
            display: inline-block;

        }
    </style>

</head>

<body>

    <section class="hero">
        <div class="maim-width">

            <header>
                <div class="logo">
                    <h2><a href="../index.html">GameOn</a></h2>
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
                        <li class="btn"><a href="#">Download</a></li>
                    </ul>
                </nav>
            </header>
            <div class="name">
                SNAKE
            </div>

            <div class="snakelogo">
                <img src="../img/2111.png " style="height:600px;">
            </div>

            <div class="level">

            <a href="../snake/snake01.html"><input type="button" value="1" class="遊戲開始" style="width:350px;height:50px;"></a>
            <a href="../snake/snake02.html"><input type="button" value="2" class="遊戲開始" style="width:350px;height:50px;"></a>
            <a href="../snake/snake03.html"><input type="button" value="3" class="遊戲開始" style="width:350px;height:50px;"></a>
            <br>










<!-- ================================================================================================================================================= -->

                <a href="../snake/snake01.html"><input type="button" value="1" class="遊戲開始"
                    <?php  $username = $_COOKIE['username'];
                    $sql = mysqli_query($conn,  "SELECT name FROM buyfinish where username='$username'" );
                    $gamemode='gamemode';
                    $gamemode2='gamemode2';
                    $gamemode3='gamemode3';

                        /*如果資料表有東西，每個都列出來 */
                        if (mysqli_num_rows($sql) > 0) {
                            while ($fetch_product2 = mysqli_fetch_assoc($sql)) {
                

                        if($fetch_product2['name']!=$gamemode2 || $fetch_product2['name']!=$gamemode3){
                            echo 
                            'style="display:none;"';
                            
                        
                        
                        }    
                        else{ 
                            echo 
                            'style="width:350px;height:50px;"';
                        }
    
                            // if($fetch_product2['name']==$gamemode ){
                            //     echo 'style="width:350px;height:50px;"'
                            //     break;
                                
                            //     }    
                            //     else{ 
                                
                            //         echo 'style="display:none;"';;}
                        };
                        };  
                        ?>
                        ></a>




     


<!-- ================================================================================================================================================= -->



    <a href="../snake/snake02.html"><input type="button" value="2" class="遊戲開始"
        <?php  $username = $_COOKIE['username'];
        $sql2 = mysqli_query($conn,  "SELECT name FROM buyfinish where username='$username'" );
        $gamemode='gamemode';
        $gamemode2='gamemode2';
        $gamemode3='gamemode3';
    

        /*如果資料表有東西，每個都列出來 */
        if (mysqli_num_rows($sql2) > 0) {
            while ($fetch_product2 = mysqli_fetch_assoc($sql2)) {
    
                if($fetch_product2['name']!=$gamemode || $fetch_product2['name']!=$gamemode3){
                    echo 
                    'style="display:none;"'; 
                }    
                else{ 
                    echo 
                    'style="width:350px;height:50px;"';
                }
        
        };
        }; 
        ?>
    ></a>








<!-- ================================================================================================================================================= -->




    <a href="../snake/snake03.html"><input type="button" value="3" class="遊戲開始"
    
        <?php
        $username = $_COOKIE['username'];
        $sql3 = mysqli_query($conn,  "SELECT name FROM buyfinish where username='$username'" );
        $gamemode='gamemode';
        $gamemode2='gamemode2';
        $gamemode3='gamemode3';
     

        /*如果資料表有東西，每個都列出來 */
        if (mysqli_num_rows($sql3) > 0) {
            while ($fetch_product3 = mysqli_fetch_assoc($sql3)) {
               
                    if($fetch_product3['name']!=$gamemode || $fetch_product3['name']!=$gamemode2){
                        echo
                        'style="display:none;"';
                    }    
                    else{ 
                        echo 
                        'style="width:350px;height:50px;"';
                        
                    }
         };
        }; 
        ?> 
     ></a>
        
 <!-- ================================================================================================================================================= -->    

            </div>
        </div>

    </section>

</body>

</html>