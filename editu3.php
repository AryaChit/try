<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="addv.js"></script>
    <style>
      p{
        font-size: 3rem;
        margin-right: 20px;
       }
       .input-control {
    display: flex;
    flex-direction: column;
}

.input-control input {
    border: 2px solid #f0f0f0;
	border-radius: 4px;
	display: block;
	font-size: 12px;
	padding: 10px;
	width: 100%;
}

.input-control input:focus {
    outline: 0;
}

.input-control.success input {
    border-color: #09c372;
}

.input-control.error input {
    border-color: #ff3860;
}

.input-control .error {
    color: #ff3860;
    font-size: 9px;
    height: 13px;
}
    </style>
</head>
<body>

<div class="container-xl mt-4">
<form method="POST" action="editup3.php" name="submit" enctype="multipart/form-data" id="form">
<?php echo "EDIT $tit";?>

<div class="mb-3">
  <input class="form-control" type="hidden" name="id" value=<?php echo $id;?> >
</div>
  <div class="mb-3">
  <div class="input-control">
      <label for="title" class="form-label">Title</label>
    <input class="form-control" type="text" name="title" id="title" value="<?php echo $tit?>" >
    <div class="error"></div>
      </div>
  </div>
  <div class="mb-3">
  <div class="input-control">
  <label for="formFile" class="form-label">Picture</label>
  <i><?php echo $p;?></i><br>
  <input class="form-control" type="file" name="pic" id="picture">
  <div class="error"></div>
      </div>
  </div>
  <div class="mb-3">
  <div class="input-control">
  <label for="formFile" class="form-label" >Pdf File</label>
  <input class="form-control" type="file" name="file" id="fil">
  <div class="error"></div>
      </div>
  </div>
  <div class="mb-3">
  <div class="input-control">
      <label for="title" class="form-label">Description</label>
    <input class="form-control" type="text" name="description" id="description" value="<?php echo $d ?>">
    <div class="error"></div>
      </div>
  </div>
 <input type="submit" class="btn btn-primary" name="submit" value="update"> 
</form> 
</div>
</body>
</html>