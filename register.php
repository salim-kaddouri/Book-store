<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:login.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <style>
      input{
         text-align: center;
      }
    .form-container {
    
    width: 40%;
    box-shadow: 1px 1px 10px silver;
    margin-top: 90px;
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

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>انشاء حساب جديد</h3>
      <input type="text" name="name" required placeholder="اسم السمتخدم" class="box">
      <input type="email" name="email" required placeholder="البريد الالكتروني" class="box">
      <input type="password" name="password" required placeholder="كلمة المرور" class="box">
      <input type="password" name="cpassword" required placeholder="تأكيد كلمة المرور" class="box">
      <input type="submit" name="submit" class="btn" value="تسجيل حساب">
      <p>هل لديك حساب؟ <a href="login.php"> تسجيل دخول</a></p>
   </form>

</div>
</center>
</body>
</html>