<?php
session_start();
include("co.php");
if (isset($_GET['id'])) {  
    $id = $_GET['id']; 
    $uid=$_SESSION["id"] ; 
    $sq= "DELETE FROM bookm WHERE bid=$id AND uid=$uid";
            $qry=mysqli_query($conn, $sq);
} 
$uid=$_SESSION["id"] ;
//echo"$uid";
$sql="SELECT b.id, b.title, b.Photo, b.file FROM book AS b JOIN bookm AS bm On b.id=bm.bid WHERE bm.uid=$uid;";
$qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"/>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <style>
      p{
        font-size: 3rem;
        margin-right: 20px;
       }
    </style>
    </head>
<body>
<?php
include("headeruser.php");
?>
<div class="container-xl">
<table class="table caption-top table-hover" >
<caption><b>List of Bookmarks</b></caption>
  <thead>
    <tr>
      <th scope="col">Book Name</th>
      <th scope="col">Picture</th>
      <th scope="col">Book</th>
      <th scope="col">Bookmark</th>
    </tr>
  </thead>
  <?php
    $count=mysqli_num_rows($qry);
    if($count>=1){
        // echo "<h3>We have $count records.</h3>";
        while($row=mysqli_fetch_array($qry)){
            echo "<tr>";
            // echo "<td>".$row['id']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td><img src=uploads/img/".$row['Photo']." style=width:100px;height:100px></td>";
            echo "<td><a href=uploads/file/".$row['file'].">".$row['file']."</a></td>";
            // echo "<td>
            // <iframe src=uploads/".$row['file']." width=500px frameborder=0 height=500px></iframe>
            // </td>";
            //echo "<td> <a href=view2.php?id=".$row['id'].">Remove bookmark</a> </td>";
            // echo "<td> <a href=mainview.php?id=".$row['id']."><img src=img/removef.png alt=fav style=width:20px;height:20px></a> </td>";
            echo "<td><a href='favorites.php?id=" . $row['id'] . "'><img src='img/removef.png' alt='fav' style='width:20px;height:20px;'></a></td>";

            echo "</tr>";
        }
    }
    else{
        echo "<h1>Sorry no record Found</h1>";
    }

    echo"</tbody>";
    echo "</table>";
    ?>
</table>
<?php
include("footer.php");
?>
</div>


</body>
</html>