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
       .error{
        color:#f00;
       }
    </style>
    <script type="text/javascript">

function validateForm() {
  var e = 0;
  var t = document.addbook.title.value;
  var p = document.addbook.photo.value;
  var f = document.addbook.thumb.value;
  var d = document.addbook.description.value;
  if (t.trim() == '') {
      document.getElementById('ert').innerHTML = "*Title is Required";
      e++;
  }  
  else 
  {
          document.getElementById('ert').innerHTML = "";
    }

  if (p.trim() == '') {
      document.getElementById('erp').innerHTML = "*Picture is required";
      e++;
  } else {
    var extension = p.substring(p.lastIndexOf('.') + 1);
    var validatepic=["jpeg","jpg","png"];
    var resultp=validatepic.includes(extension);
    // console.log(resultp);
    // console.log(extension);
      if (extension=="jpeg" || extension=="jpg" || extension=="png") {
        document.getElementById('erp').innerHTML = "";
      } else {
        document.getElementById('erp').innerHTML = "*Picture must be in jpge/ jpg/ png format";
          e++;
      }
    }

  if (f.trim() == '') {
      document.getElementById('erf').innerHTML = "*File is required";
      e++;
  } else {
    var exten = f.substring(f.lastIndexOf('.') + 1);
    var validatefil=["pdf"];
    var resultf=validatefil.includes(exten);
    // console.log(resultf);
    // console.log(exten);
    if(exten =="pdf"){
        document.getElementById('erf').innerHTML = "";
    }
    else{
        document.getElementById('erf').innerHTML = "*File must be in pdf format";
        e++;
    }
      
  }
  if (d.trim() == '') {
      document.getElementById('erd').innerHTML = "*Description is required";
      e++;
  } 
    else{
        document.getElementById('erd').innerHTML = "";
        e++;
    }
  if(e>0)
  {
    return false;
  }
  else
  {
    return true;
  }
  }
  </script>
</head>
<body>
<?php
include("headerprac.php");
?>
<?php
if(isset($_POST["addbook"])){
    $tit=$_POST['title'];
    $np=$_FILES["photo"]["name"];
    $tmpnamep=$_FILES["photo"]["tmp_name"];
    $updlocationp="uploads/img/".$np;
    $name=$_FILES["thumb"]["name"];
    $tmpname=$_FILES["thumb"]["tmp_name"];
    $updlocation="uploads/file/".$name;
    $dp=$_POST['description'];
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
?>
<div class="container-xl mt-4">
<form method="POST" action="" name="addbook" enctype="multipart/form-data" onsubmit="return validateForm()">

  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" Placeholder="title">
    <span id="ert"class="error"></span>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Picture</label>
  <input class="form-control" type="file" name="photo" >
  <span id="erp"class="error"></span>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label" >Pdf File</label>
  <input class="form-control" type="file" name="thumb">
  <span id="erf"class="error"></span>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" name="description" Placeholder="Description">
    <span id="erd"class="error"></span>
    <!-- <textarea name="description" id="description" cols="30" rows="10"></textarea> -->
  </div>
  <button type="submit" class="btn btn-primary" name="addbook" value="Add Book">Add</button>
</form> 
</div>

</body>
</html>
