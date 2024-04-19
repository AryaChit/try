<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <!-- bootstrap 5 CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>
<body>
<?php
if(isset($_POST["login"])){
    $e=$_POST["email"];
    $p=md5($_POST["password"]);
    //echo"$email,$up"
    $sql = "SELECT * FROM prac WHERE email='$e' AND password='$p'";
    include("co.php");
    $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //counting the affected rows\
    $count=mysqli_num_rows($qry);
    if($count==1)
    {
        while($row=mysqli_fetch_array($qry)){
            $nam=$row['name'];
            $i=$row['id'];
            $r=$row['role'];
        }
        if($r=="admin")
        {
            $_SESSION["id"] = $i;
            header("Location:store.php");
        }
        else{
            $_SESSION["id"] = $i;
            header("Location:mainbookmark.php");
        }
    }
    else
    {
        echo"wrong  email or password";
    }

}
?>
    <div class="d-flex justify-content-center align-items-center"
         style="min-height: 100vh;">
        <form class="p-5 rounded shadow"
              style="max-width: 30rem; width: 100%"
              method="POST" >

          <h1 class="text-center display-4 pb-5">LOGIN</h1>

          <div class="mb-3">
            <label for="exampleInputEmail1" 
                   class="form-label">Email address</label>
            <input type="email" 
                   class="form-control" 
                   name="email" 
                   id="exampleInputEmail1" 
                   aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" 
                   class="form-label">Password</label>
            <input type="password" 
                   class="form-control" 
                   name="password" 
                   id="exampleInputPassword1">
          </div>
          <button type="submit" 
                  class="btn btn-primary"
                  name="login">
                  Login</button>
                  <button
		          class="btn btn-primary"
                  name="register"><a href='mainregister.php' style="color:white;text-decoration: none;">
		          Register</a></button>
             
             <!-- <a href="bookmark.php">Store</a>  -->
        </form>
    </div>
</body>
</html>
