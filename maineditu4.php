<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
        </style>
    <script type="text/javascript">
      function validate() {
        var e = 0;
        var t = document.submit.title.value;
        var p = document.submit.pic.value;
        var f = document.submit.file.value;
        var d = document.submit.description.value;
        
        if (t.trim() == '') {
          document.getElementById('ert').innerHTML = "*Title is Required";
          e++;
        } else {
          document.getElementById('ert').innerHTML = "";
        }

        if (p.trim() == '') {
          document.getElementById('erp').innerHTML = "*Picture is required";
          e++;
        } else {
          var extension = p.substring(p.lastIndexOf('.') + 1).toLowerCase();
          var validatepic = ["jpeg", "jpg", "png"];
          if (validatepic.includes(extension)) {
            document.getElementById('erp').innerHTML = "";
          } else {
            document.getElementById('erp').innerHTML = "*Picture must be in jpeg/jpg/png format";
            e++;
          }
        }

        if (f.trim() == '') {
          document.getElementById('erf').innerHTML = "*File is required";
          e++;
        } else {
          var exten = f.substring(f.lastIndexOf('.') + 1).toLowerCase();
          if (exten === "pdf") {
            document.getElementById('erf').innerHTML = "";
          } else {
            document.getElementById('erf').innerHTML = "*File must be in pdf format";
            e++;
          }
        }

        if (d.trim() == '') {
          document.getElementById('erd').innerHTML = "*Description is required";
          e++;
        } else {
          document.getElementById('erd').innerHTML = "";
        }

        return e === 0;
      }
    </script>
</head>
<body>

<?php
if(isset($_POST["submit"])){
$i=$_POST["id"];
$t=$_POST['title'];
$pname=$_FILES["pic"]["name"];
$tmpnamep=$_FILES["pic"]["tmp_name"];
$updlocationp="uploads/img/".$pname;    
$fname=$_FILES["file"]["name"];
$tmpname=$_FILES["file"]["tmp_name"];
$updlocation="uploads/file/".$fname;
$des=$_POST['description'];
        $sq = "UPDATE book SET title='$t', Photo='$pname', file='$fname', description='$des' WHERE id=$i";
        $qr=mysqli_query($conn, $sq) or die(mysqli_error($conn));
        if($qr){
          header("Location:admin.php?msg=RecordUpdated");
          move_uploaded_file($tmpname, $updlocation);
          move_uploaded_file($tmpnamep, $updlocationp);
        }
    }

?>

<div class="container-xl mt-4">
<form method="POST" action="" name="submit" enctype="multipart/form-data" onsubmit="return validate()">
<?php echo "EDIT $tit";?>
<div class="mb-3">
  <input class="form-control" type="hidden" name="id" value=<?php echo $id;?> >
</div>
  <div class="mb-3">
      <label for="title" class="form-label">Title</label>
    <input class="form-control" type="text" name="title" id="title" value="<?php echo $tit;?>">
    <span id="ert" class="error"></span>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Picture</label>
  <i><?php echo $p;?></i><br>
  <input class="form-control" type="file" id="formFilePhoto" name="pic">
  <span id="erp" class="error"></span>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label" >Pdf File</label>
  <i><?php echo $f;?></i><br>
  <input class="form-control" type="file" id="formFilePdf" name="file">
  <span id="erf" class="error"></span>
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Description</label>
    <input class="form-control" type="text" name="description"  id="description" value="<?php echo $d; ?>" >
    <span id="erd" class="error"></span>
  </div>
 <input type="submit" class="btn btn-primary" name="submit" value="update"> 
</form> 
</div>
</body>
</html>