<?php

$te = $pe = $fe = $de ="";
if(isset($_POST["submit"])){

    $i=$_POST["id"];
    if (empty($_POST["title"])) {
        $te = "*Title is required";
    }
    else{
        $tit=$_POST['title'];
    }
    if (empty($_FILES["photo"]["name"])) {
        $pe = "*Picture is required";
    }
    else{
        if(($_FILES["pic"]["type"])=="image/jpeg" || ($_FILES["pic"]["type"])=="image/jpg" || ($_FILES["pic"]["type"])=="image/png")
        {
            $pname=$_FILES["pic"]["name"];
            // $sp=$_FILES["pic"]["size"];
            // $tp=$_FILES["pic"]["type"];
            $tmpnamep=$_FILES["pic"]["tmp_name"];
$           updlocationp="uploads/img/".$pname;    
        }
        else
        {
            $pe = "*Picture needs to be in jpg or jpeg or png";
        }
        
    }
    if (empty($_FILES["file"]["name"])) {
        $fe = "*File is required";
    }
    else{
        if (($_FILES["thumb"]["type"])!= 'application/pdf')
        {
            $fe = "*File needs to be pdf";
        }
        else{
            $fname=$_FILES["file"]["name"];
            //$size=$_FILES["file"]["size"];
            //$type=$_FILES["file"]["type"];
            $tmpname=$_FILES["file"]["tmp_name"];
            $updlocation="uploads/file/".$fname;
        }


    }
    if (empty($_POST["description"])) {
        $de = "*Description is required";
    }
    else{
        $dp=$_POST['description'];
    }

    if($te == "" && $pe == "" && $fe == "" && $de == "")
    {
        $sql = "UPDATE book SET title='$t', Photo='$pname', file='$fname', description='$des' WHERE id=$i";
        include("co.php");
        $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if($qry){
            header("Location:admin.php?msg=Record Updated");
            move_uploaded_file($tmpname, $updlocation);
            move_uploaded_file($tmpnamep, $updlocationp);
        }
    }
}


$t=;
$des=;
// $p=$_POST["pic"];
// $f=$_POST["file"];




//echo"$i $t $pname $fname";


}
?>