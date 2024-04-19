<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>


<?php
include("headerprac.php");
//capturing the data from the url
if(isset($_GET['id'])&isset($_GET['action']))
{
    $id=$_GET['id'];
    $action=$_GET['action'];
    switch($action){
        case 'edit':{
            // echo "You are editing the record.,";
            $sql = "SELECT * FROM prac where id=$id";
            include("co.php");
            $qry=mysqli_query($conn, $sql);
            while($row=mysqli_fetch_array($qry)){
                $id=$row['id'];
                $nam=$row['username'];
                $e=$row['email'];
                $p=$row['password'];
                $r=$row['role'];
                //include("editu.php");
                include("edituser3.php");
            }
            break;
        }
        
        case 'delete':
            {

                $sql="DELETE FROM prac where id=$id";
                include("co.php");
                $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if($qry){
                    header("Location:user.php?msg=record deleted successfully");
                }

                 break;
            }
        default:{
            echo "Unable to perform the task";
            break;
        }
    }

}
else{
    //redirect to user.php
    header("Location:admin.php");
}
    ?>
</body>
</html>