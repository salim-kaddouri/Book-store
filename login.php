<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:shop.php');
   }else{
      $message[] = 'incorrect password or email!';
   }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <style>
.form-container {
    width: 40%;
    box-shadow: 1px 1px 10px silver;
    margin-top: 120px;
    padding: 10px;
}

h3 {
    font-family: 'Cairo', sans-serif;
}

.box {
    margin-bottom: 10px;
    width: 100%;
    padding: 5px;
    font-family: 'Cairo', sans-serif;
    font-size: 15px;
    font-weight: bold;
}

.btn {
    border: none;
    padding: 10px;
    width: 100%;
    font-weight: bold;
    font-size: 15px;
    background-color: #1AC15c;
    cursor: pointer;
    font-family: 'Cairo', sans-serif;
    margin-bottom: 15px;
    color: white;
}

p {
    font-family: 'Cairo', sans-serif;
}

a {
    text-decoration: none;
    font-size: 20px;
    color: brown;
    font-weight: bold;
    font-family: 'Cairo', sans-serif;
}
      input{
         text-align: center;
      }
   </style>
</head>
<body>


   <center>
    <div class="form-container">

   <form action="" method="post">
      <h3>تسجيل الدخول</h3>
      <input type="email" name="email" required placeholder="البريد الالكتروني" class="box">
      <input type="password" name="password" required placeholder="كلمة المرور" class="box">
      <input type="submit" name="submit" class="btn" value="تسجيل الدخول">
      <p>هل تملك حساب بالفعل؟ <a href="register.php"> حساب جديد</a></p>
   </form>

</div>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   </center>

</body>
</html>