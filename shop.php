<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online";
    $conn = mysqli_connect($servername, $username, $password, $dbname); 
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        h3{
            margin-top:10px;
            font-family:'Cairo',sans-serif;
            font-weight:bold;
            font-size:20px;
        }

        .card{
            width: 18rem;
            height: inherit;
             float:right;
             margin-top:10px;
             margin-left:10px;
             margin-right:10px;
        }
        .card img{
            width:100%;
            height:100%;
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
<body>
    <nav class='navbar navbar-dark bg-dark'>
                <?php
                      $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
                        if(mysqli_num_rows($select_user) > 0){
                             $fetch_user = mysqli_fetch_assoc($select_user);
                         };
                ?>
         <a href="login.php?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');">تسجيل الخروج </a>
         <h3 class="navbar-brand" >المستخدم الحالي : <span> <?php echo $fetch_user['name']; ?></span> </h3>
        <a class="navbar-brand" href="card.php"> MyCard | عربتي </a>
          <h3 class="navbar-brand"> المنتجات المتوفرة </h3>
    </nav>
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
        <a href='val.php? id=$row[id]' class='btn btn-success'> إضافة المنتج إلى العربة </a>
        </div>
        </div>
        </main> 
        <center>";
    }


?>


</body>
</html>