<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        h3{
            margin-top:15px;
            font-family:'Cairo',sans-serif;
            font-weight:bold;
        }

    </style>
</head>
<body>

<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $ID=$_GET['id'];
    mysqli_query($conn , "DELETE FROM prod WHERE id=$ID" );
    header('location: proud.php');
?>

</body>
</html>