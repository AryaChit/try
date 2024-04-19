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
$te = $pe = $fe = $de ="";
if(isset($_POST["submit"])){

    if (empty($_POST['title'])) {
        $te = "*Title is required";
    }
    else{
        $tit=$_POST['title'];
    }
    if (empty($_FILES["photo"]["name"])) {
        $pe = "*Picture is required";
    }
    else{
        if(($_FILES["photo"]["type"])=="image/jpeg" || ($_FILES["photo"]["type"])=="image/jpg" || ($_FILES["photo"]["type"])=="image/png")
        {
            $np=$_FILES["photo"]["name"];
            $tmpnamep=$_FILES["photo"]["tmp_name"];
            $updlocationp="uploads/img/".$np;

            
        }
        else
        {
            $pe = "*Picture needs to be in jpg or jpeg or png";
        }
        
    }
    if (empty($_FILES["thumb"]["name"])) {
        $fe = "*File is required";
    }
    else{
        if (($_FILES["thumb"]["type"])!= 'application/pdf')
        {
            $fe = "*File needs to be pdf";
        }
        else{
            $name=$_FILES["thumb"]["name"];
            $tmpname=$_FILES["thumb"]["tmp_name"];
            $updlocation="uploads/file/".$name;
        }


    }
    if (empty($_POST['description'])) {
        $de = "*Description is required";
    }
    else{
        $dp=$_POST['description'];
    }

    if($te == "" && $pe == "" && $fe == "" && $de == "")
    {
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
    <span class="error"><?php echo $te; ?></span>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Picture</label>
  <input class="form-control" type="file" id="formFile" name="photo" >
  <span class="error"><?php echo $pe; ?></span>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label" >Pdf File</label>
  <input class="form-control" type="file" id="formFile" name="thumb">
  <span class="error"><?php echo $fe; ?></span>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" name="description" id="description" Placeholder="Description">
    <span class="error"><?php echo $de; ?></span>
    <!-- <textarea name="description" id="description" cols="30" rows="10"></textarea> -->
  </div>
  <button type="submit" class="btn btn-primary"name="submit" value="Add Book">Add</button>
</form> 
</div>

</body>
</html>
