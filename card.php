<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    session_start();
    $user_id = $_SESSION['user_id'];
      $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
          if(mysqli_num_rows($select_user) > 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
            };
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>السلة</title>
    <style>
       h3{
            margin-top:15px;
            font-family:'Cairo',sans-serif;
            font-weight:bold;
        }
        main{
            width:50%;
            margin-top:30px;
        }
        table{
            box-shadow:1px 1px 10px silver;
        }
        thead{
            background: #3498DB;
            color:white;    
            text-align:center;
        }
        tbody{
            text-align:center;
            font-weight:bold;

        }   
        a {
    text-decoration: none;
    font-size: 20px;
    color: brown;
    font-weight: bold;
    font-family: 'Cairo', sans-serif;
}
    </style>
</head>

<body dir="rtl">
    <center>
        <h3>منتجاتك المحجوزة</h3>
    </center>
    <?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $rus=mysqli_query($conn , "SELECT * FROM addcard WHERE user_id=$user_id");
    while($row=mysqli_fetch_array($rus)){
        echo "
            <center>
        <main>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>اسم المنتج</th>
                        <th scope='col'>سعر المنتج</th>
                        <th scope='col'>حذف المنتج</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td> <a href='del_card.php? id=$row[id]' class='btn btn-danger'>إزالة</a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </center>
        ";
    }
?>
<center>
    <a href="shop.php">الرجوع لصفحة المنتجات </a>
</center>
</body>
</html>