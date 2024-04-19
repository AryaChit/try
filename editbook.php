<?php
include("co.php");
if(isset($_POST["submit"]) && $_POST["submit"]=='update'){
$i=$_POST["id"];
$t=$_POST['title'];
$pname=$_FILES["pic"]["name"];
$tmpnamep=$_FILES["pic"]["tmp_name"];
$updlocationp="uploads/img/".$pname;    
$fname=$_FILES["file"]["name"];
$tmpname=$_FILES["file"]["tmp_name"];
$updlocation="uploads/file/".$fname;
$des=$_POST['description'];
        $sq = "UPDATE book SET title='$t', Photo='$pname', file='$fname', description='$des' WHERE id=$i";
        $qr=mysqli_query($conn, $sq) or die(mysqli_error($conn));
        if($qr){
            move_uploaded_file($tmpname, $updlocation);
            move_uploaded_file($tmpnamep, $updlocationp);
            header("Location: admin.php?msg=RecordUpdated");
        }
    }

?>
