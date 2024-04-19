<?php
$nerror = $eerror = $perror = "";
$name = $email = $password = "";

function input_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])){
    if (empty($_POST['username'])) {
        $nerror = "*Name is required";
    } else {
        $name = input_data($_POST['username']);
        if (!preg_match("/^[a-zA-Z\s]{3,5}$/", $name)) {
            $nerror = "* Username should contain alphabets and should be between 3 and 5 characters";
        }
        // if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        //     $nerror = "*Only alphabets and white spaces are allowed";
        // }
    }
    if (empty($_POST['email'])) {
        $eerror = "*Email is required";
    } else {
        $email = input_data($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $eerror = "*Invalid Email format";
        }
    }
    
    // Validate password
    if (empty($_POST['password'])) {
        $perror = "*Password is required";
     } else {
        $password = input_data($_POST['password']);
        // Ensure password length is greater than 8 characters
        if (strlen($password) <= 8) {
            $perror = "* Password should be greater than 8 characters";
        }
        // Ensure password contains at least one number and one special character
        if (!preg_match("/[0-9]/", $password) || !preg_match("/[^a-zA-Z0-9\s]/", $password)) {
            $perror = "* Password must contain at least one number and one special character";
        }
    }
   
    //else {
    //     $password = input_data($_POST['password']);
    //     // Ensure password contains numbers
    //     if (!preg_match("/[0-9]/", $password) || !preg_match("/[^a-zA-Z0-9\s]/", $password)) {
    //         $perror = "*Password must contain at least one number and one special character";
    //     }
    // }
   
    if($nerror == "" && $eerror == "" && $perror == ""){
        $u=$_POST['username'];
        $p=md5($_POST['password']); // Hash the password with MD5
        $e=$_POST['email'];
        include("co.php");
        //Writing the sql for inserting the user into prac table
        $sql = "INSERT into prac(`username`,`email`,`password`,`role`)VALUES('$u','$e','$p','user')";
    
        //Executing the query
        $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($qry){
            // echo "Data inserted successfully";
            header("location:login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- bootstrap 5 CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
  
       <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">

        <form method="post" class="p-5 rounded shadow" style="max-width: 30rem; width: 100%"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1 class="text-center display-4 pb-5">Signup</h1>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" value=""> 
                <span class="error"><?php echo $nerror; ?></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <span class="error"><?php echo $eerror; ?></span>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                <span class="error"><?php echo $perror; ?></span>
                
            </div>

            <button type="submit" class="btn btn-primary" value="register" name="submit">Signup</button>
        </form>
    </div>

</body>

</html>

