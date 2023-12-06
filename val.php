<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $ID=$_GET['id'];
    $up= mysqli_query($conn , "SELECT * FROM prod WHERE id=$ID" );
    $data=mysqli_fetch_array($up);
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
    <title>تأكيد شراء المنتج </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

    input{
        display:none;
    }
    .main{
        width:50%; 
        height: 60%;   
        padding:60px;
        box-shadow:1px 1px 10px silver;
        margin-top:80px;
    
    }
    a{
    text-decoration: none;
    font-size: 20px;
    color: brown;
    font-weight: bold;
    font-family: 'Cairo',sans-serif;
 }
 button{
    border:none;
    padding: 15px;
    width: 40%;
    font-weight: bold;
    font-size: 16px;
    background-color:#d9d926;
    cursor: pointer;
    font-family: 'Cairo',sans-serif;
    margin-bottom: 15px;
}
    h3{
            margin-top:10px;
            font-family:'Cairo',sans-serif;
            font-weight:bold;
            font-size:30px;
        }

</style>
</head>
<body>
    <center>
        <div class ="main">
            <form action="insert_card.php" method="post">
                <h3> هل فعلا تريد شراء المنتج </h3>
                <br>
                <input type="text" name='id' value='<?php echo $data['id'] ;?>' >
                <input type="text" name='name' value='<?php echo $data['name'] ;?>' >
                <input type="text" name='price'  value='<?php echo $data['price'] ;?>' >
                <input type="text" name='user_id'  value='<?php echo $user_id; ?>' >
                <button type="submit" name="add" >أضف المنتج الى العربة </button>
                <br>
                <br>
                <a href="shop.php"> الرجوع الى صفحة المنتجات</a>
            </form>
        </div>
    </center>

</body>
</html>

