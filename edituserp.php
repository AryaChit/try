<?php
if(isset($_POST["updateuser"])){
$i=$_POST["id"];
$n=$_POST["name"];
$ema=$_POST["em"];
$rol=$_POST["ro"];
$sql = "UPDATE prac SET username='$n', email='$ema', role='$rol' WHERE id=$i";
include("co.php");
$qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($qry){
    header("Location:user.php");
}
}
else{
    header("Location:user.php");
}
?>