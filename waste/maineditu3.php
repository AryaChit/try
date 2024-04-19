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

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-xl">
     <p>
     <img src=uploads/img/book.jpg alt=fav style=width:52px;height:52px></a>
     </p>
     <a class="navbar-brand" href="mainbookmark.php"> 
     BookStore
     </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="editdelete.php">Book edits</a>
        </li>
      <li class="nav-item">
          <a class="nav-link" href="user.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav> -->
<div class="container-xl mt-4">
<form method="POST" action="editup3.php" name="submit" enctype="multipart/form-data">
<?php echo "EDIT $tit";?>

<div class="mb-3">
  <input class="form-control" type="hidden" name="id" value=<?php echo $id;?> >
</div>
  <div class="mb-3">
      <label for="title" class="form-label">Title</label>
    <input class="form-control" type="text" name="title" value="<?php echo $tit;?>">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Picture</label>
  <i><?php echo $p;?></i><br>
  <input class="form-control" type="file" name="pic">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label" >Pdf File</label>
  <input class="form-control" type="file" name="file">
  </div>
  <div class="mb-3">
      <label for="title" class="form-label">Description</label>
    <input class="form-control" type="text" name="description" value="<?php echo $d?>" >
  </div>
 <input type="submit" class="btn btn-primary" name="submit" value="update"> 
</form> 
</div>
</body>
</html>