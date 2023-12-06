<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المنتج  </title>
    <link rel="stylesheet" href="index.css">
    <style>
        .dis{
            display:none;
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

    $up= mysqli_query($conn , "SELECT * FROM prod WHERE id=$ID" );
    $data=mysqli_fetch_array($up)
?>

    <center>

     <div class="main">
            <form action="UPP.php" method="post" enctype="multipart/form-data">
                <h2>تعديل المنتج </h2>
                <input class="dis" type="text" name='id' dir="rtl"  value='<?php echo $data['id'] ;?>' >
                <br>
                 <input type="text" name='name' dir="rtl"  value='<?php echo $data['name'] ;?>' > <span> :المنتج </span>
                <br>
                <input type="text" name='price'  dir="rtl"  value='<?php echo $data['price'] ;?>' ><span> :السعر </span>
                <br>
                <input type="file" id="file" name="image" style="display:none;">
                <label for="file">تحديث صورة المنتج</label>
                <button name="upload" id="uploadButton"> تحديث المنتج</button>
                <br><br>
                <a href="proud.php"> رجوع الى صفحة المنتجات </a>
            </form>
        </div>

             <br><br>
        <p>Developer By Salim</p>
    </center>

</body>
</html>