<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['add'])){
    $NAME = $_POST['name'];
    $PRISE = $_POST['price'];
    $IDD=$_POST['user_id'];
    $insert   = "INSERT INTO addcard(name, price ,user_id) VALUES ('$NAME','$PRISE','$IDD')";
    mysqli_query($conn, $insert);
   header('location: card.php');
}

?>