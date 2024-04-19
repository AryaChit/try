<?php
if(isset($_POST["submit"])){
$i=$_POST["id"];
$t=$_POST["title"];
$des=$_POST["description"];
// $p=$_POST["pic"];
// $f=$_POST["file"];
$fname=$_FILES["file"]["name"];
$size=$_FILES["file"]["size"];
$type=$_FILES["file"]["type"];
$tmpname=$_FILES["file"]["tmp_name"];
$updlocation="uploads/file/".$fname;

$pname=$_FILES["pic"]["name"];
$sp=$_FILES["pic"]["size"];
$tp=$_FILES["pic"]["type"];
$tmpnamep=$_FILES["pic"]["tmp_name"];
$updlocationp="uploads/img/".$pname;

//echo"$i $t $pname $fname";

$sql = "UPDATE book SET title='$t', Photo='$pname', file='$fname', description='$des' WHERE id=$i";
include("co.php");
$qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($qry){
    header("Location:admin.php?msg=Record Updated");
    move_uploaded_file($tmpname, $updlocation);
    move_uploaded_file($tmpnamep, $updlocationp);
}
}
?>