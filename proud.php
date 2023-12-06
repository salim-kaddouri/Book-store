<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات- المسؤول</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        h3{
            margin-top:15px;
            font-family:'Cairo',sans-serif;
            font-weight:bold;
        }
        .card{
            width: 18rem;
            height: inherit;
             float:right;
             margin:10px;

        }
        .card img{
            width:100%;
            height:100%;
        }
        
    </style>
</head>
<body>
    <center>
        <h3 >جميع المنتجات -صفحة التحكم </h3>
    </center>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $rus=mysqli_query($conn , "SELECT * FROM prod");

    while($row=mysqli_fetch_array($rus)){
        echo "
        <center>
        <main>
        <div class='card'>
        <img  src='$row[img]' class='card-img-top'>
        <div class='card-body'>
        <h5 class='card-title'>$row[name]</h5>
        <p class='card-text'>$row[price]</p>
        <a href='delet.php? id=$row[id]' class='btn btn-danger'>حذف المنتج </a>
        <a href='up.php? id=$row[id]' class='btn btn-primary'>تعديل المنتج </a>
        </div>
        </div>
        </main> 
        <center>";
    }


?>


</body>
</html>