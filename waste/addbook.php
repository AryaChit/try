<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
      p{
        font-size: 3rem;
        margin-right: 20px;
       }
    </style>
</head>
<body>
<?php
include("headerprac.php");
?>
<?php
//check the form is submitted or not
if(isset($_POST["submit"])){
    //capturing the data
    $np=$_FILES["photo"]["name"];
    $sp=$_FILES["photo"]["size"];
    $tp=$_FILES["photo"]["type"];
    $tmpnamep=$_FILES["photo"]["tmp_name"];
    $updlocationp="uploads/img/".$np;

    $dp=$_POST['description'];
    $tit=$_POST['title'];
    $name=$_FILES["thumb"]["name"];
    $size=$_FILES["thumb"]["size"];
    $type=$_FILES["thumb"]["type"];
    $tmpname=$_FILES["thumb"]["tmp_name"];
    $updlocation="uploads/file/".$name;

    // Check if file type is PDF
    if ($type != 'application/pdf') {
        echo '<div class="alert alert-danger" role="alert">Only PDF files are allowed!</div>';
    } else {
        $sql="INSERT into book(title,file,Photo,description)VALUES('$tit','$name','$np','$dp')";
        include("co.php");
        $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($qry){
            //uploading the file to uploads folder 
            move_uploaded_file($tmpname, $updlocation);
            move_uploaded_file($tmpnamep, $updlocationp);
            echo '<div class="alert alert-success" role="alert">File uploaded successfully!</div>';
        }
    }
}
?>
<div class="container-xl mt-4">
<form method="POST" action="" name="addbook" enctype="multipart/form-data">

  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" Placeholder="title">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Picture</label>
  <input class="form-control" type="file" id="formFile" name="photo" accept="image/jpeg, image/png">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label" >Pdf File</label>
  <input class="form-control" type="file" id="formFile" name="thumb">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Description</label>
    <input type="text" class="form-control" name="description" Placeholder="Description">
    <!-- <textarea name="description" id="description" cols="30" rows="10"></textarea> -->
  </div>
  <button type="submit" class="btn btn-primary"name="submit" value="Add Book">Add</button>
</form> 
</div>

</body>
</html>
