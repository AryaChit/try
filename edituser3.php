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
    </style>
</head>
<body>
<?php

$ne = $ee = $re ="";
if(isset($_POST["updateuser"])){
    $i=$_POST["id"];
    if (empty($_POST["name"])) {
        $ne = "*Name is required";
    }
    else{
        $n=$_POST["name"];
    }
    if (empty($_POST["em"])) {
        $ee = "*Email is required";
    }
    else{
        $ema=$_POST["em"];
    }
    if (empty($_POST["ro"])) {
        $re = "*Role is required";
    }
    else{
        $rol=$_POST['ro'];
    }

    if($ne == "" && $ee == "" && $re == "")
    {
        $sql = "UPDATE prac SET username='$n', email='$ema', role='$rol' WHERE id=$i";
        include("co.php");
        $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($qry){
             header("Location:user.php");
        }
    }
}



?>
<div class="container-xl mt-4">
<form method="POST" action="" name="updateuser">
<?php echo "EDIT $nam";?>

<div class="mb-3">
  <input class="form-control" type="hidden" name="id" value=<?php echo $id;?> >
</div>
  <div class="mb-3">
      <label for="title" class="form-label">User Name</label>
    <input class="form-control" type="text" name="name" value=<?php echo $nam;?> >
    <span class="error"><?php echo $ne; ?></span>
  </div>
  <div class="mb-3">
      <label for="title" class="form-label">Email</label>
    <input class="form-control" type="text" name="em" value=<?php echo $e;?> >
    <span class="error"><?php echo $ee; ?></span>
  </div>
  <div class="mb-3">
      <label for="title" class="form-label">Role</label>
    <input class="form-control" type="text" name="ro" value=<?php echo $r?> >
    <span class="error"><?php echo $re; ?></span>
  </div>
 <input type="submit" class="btn btn-primary" name="updateuser" value="update"> 
</form> 
</div>
</body>
</html>