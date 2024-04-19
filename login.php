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
        echo"<Script>alert('Wrong email or password');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="p-5 rounded shadow" style="max-width: 30rem; width: 100%" method="POST" onsubmit="return validate()">
            <h1 class="text-center display-4 pb-5">LOGIN</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <label for="exampleInputEmail1" class="form-label" id="labelm" style="color:red; visibility:hidden;">Invalid</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <label for="exampleInputPassword1" class="form-label" id="labelpass" style="color:red; visibility:hidden;">Invalid</label>
                <label for="exampleInputPassword1" class="form-label" id="labelpass2" style="color:red; visibility:hidden;">Password greater than 8</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <button class="btn btn-primary" name="register"><a href='mainregister.php' style="color:white;text-decoration: none;">Register</a></button>
        </form>
    </div>

    <!-- JavaScript validation function -->
    <script type="text/javascript">
    // JavaScript validation function
    function validate() {
        var en = document.getElementById("email");
        var pa = document.getElementById("password");
        // var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Check if both email and password fields are empty
        if (en.value.trim() == "" && pa.value.trim() == "") {
            en.style.border = "solid 3px red";
            document.getElementById("labelm").style.visibility = "visible";
            pa.style.border = "solid 3px red";
            document.getElementById("labelpass").style.visibility = "visible";
            return false;
        }

        // Check if email field is empty
        if (en.value.trim() == "") {
            en.style.border = "solid 3px red";
            document.getElementById("labelm").style.visibility = "visible";
            return false;
        } else {
            // Hide the "Invalid" label for email
            document.getElementById("labelm").style.visibility = "hidden";
        }

        // Check if password field is empty
        if (pa.value.trim() == "") {
            pa.style.border = "solid 3px red";
            document.getElementById("labelpass").style.visibility = "visible";
            return false;
        } else {
            // Hide the "Invalid" label for password
            document.getElementById("labelpass").style.visibility = "hidden";
        }

        // Check if password length is less than 8 characters
        if (pa.value.trim().length < 8) {
            pa.style.border = "solid 3px red";
            document.getElementById("labelpass2").style.visibility = "visible";
            return false;
        } else {
            // Hide the "Password greater than 8" label
            document.getElementById("labelpass2").style.visibility = "hidden";
        }
        // Check if email is in a valid format
// if (!emailRegex.test(en.value.trim())) {
//     en.style.border = "solid 3px red";
//     alert("Please enter a valid email address.");
//     return false;
// }


        // All validations passed
        return true;
    }
</script>




</body>
</html>
