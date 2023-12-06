<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['upload'])){
    $NAME = $_POST['name'];
    $PRISE = $_POST['price'];
    $IMG = $_FILES['image'];
    $IMG_LOC = $_FILES['image']['tmp_name'];
    $IMG_NAME = $_FILES['image']['name'];
    $IMG_UP   = "images/".$IMG_NAME;
    
$insert = "UPDATE `prod` SET `name`='$NAME', `price`='$PRISE', `img`='$IMG_UP' WHERE `id`=" . $_POST['id'];
    mysqli_query($conn, $insert);
    header('location: proud.php');
}

?>
