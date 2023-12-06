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
    $insert   = "INSERT INTO prod(name, price, img) VALUES ('$NAME','$PRISE','$IMG_UP')";
    mysqli_query($conn, $insert);

    if(move_uploaded_file($IMG_LOC, 'images/'.$IMG_NAME)){
        echo "<script> alert('تم رفع الصورة بنجاح') </script>";
    } else {
        echo "<script> alert('حدث خطأ أثناء رفع الصورة') </script>";
    }
    header('location: index.php');
}

?>
