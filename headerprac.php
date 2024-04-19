<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-xl">
             <p>
             <img src="img/book.jpg" alt="fav" style="width:52px;height:52px"></a>
             </p>
             <a class="navbar-brand" href="store.php"> 
             BookStore
             </a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="addbook3.php">Add Books</a>
                </li>
              <li class="nav-item">
                  <a class="nav-link" href="user.php">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php">Edit Books</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">logout</a>
                </li>
              </ul>
              <form class="d-flex" method ="post" name="search" action="searchadmin.php">
                <input class="form-control me-2" type="search" name="search"placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" name="submit" value="search">Search</button>
            </form>
            </div>
          </div>
        </nav>
</body>
</html>