<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة المنتجات </title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>موقع تسويقي أونلاين</h2>
                <img src="A.png" alt="logo" width="30%">
                <img src="B.png" alt="logo" width="30%">
                <br>
                 <input type="text" name='name' dir="rtl"  placeholder="المنتج" >
                <br>
                <input type="text" name='price'  dir="rtl"placeholder="السعر (دج)" >
                <br>
                <input type="file" id="file" name="image" style="display:none;">
                <label for="file">إختيار صورة للمنتج</label>
                <button name="upload" id="uploadButton"> رفع المنتج</button>
                <br><br>
                <a href="proud.php">عرض كل المنتجات</a>
            </form>
        </div>
             <br><br>
        <p>Developer By Salim</p>
    </center>

    <script>
  const uploadButton = document.getElementById('uploadButton');
  uploadButton.addEventListener('click', function() {
    const alertDiv = document.createElement('div');
    alertDiv.classList.add('alert', 'alert-success', 'mt-3', 'text-center');
    alertDiv.innerText = 'تمت إضافة المنتج بنجاح!';
    document.body.appendChild(alertDiv);
  });
</script>

</body>
</html>