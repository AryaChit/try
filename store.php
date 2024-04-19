<?php
session_start();
include("co.php");
if (isset($_GET['id'])) 
{  
    $id = $_GET['id']; 
    $uid=$_SESSION["id"] ; 
    $sq = "INSERT into bookm(bid,uid) VALUES ($id,$uid)";
            $qry=mysqli_query($conn, $sq);
 }  

$sql="SELECT * FROM book ORDER BY id";
$qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
      .bl{
        font-size: 3rem;
        margin-right: 20px;
       }
    </style>
  </head>
 <body>

 <?php
include("headerprac.php");
?>
 <div class="container py-3">
    <div class="row mt-5">
        <?php
        $count = mysqli_num_rows($qry);
        if ($count >= 1) {
            while ($row = mysqli_fetch_array($qry)) {
        ?>
                <div class="col-md-3 mt-3">
                    <div class="card h-100" style="width: 18rem;">
                        <a href="<?php echo 'mainbookmark.php?id=' . $row['id']; ?>"><img src=img/addf.png alt=fav style=width:20px;height:20px;float:right;></a>
                        <img src="<?php echo "uploads/img/" . $row['Photo']; ?>" class="card-img-top" style="width: 250px;height: 300px;" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <!-- <h5 class="card-title"><?php echo "<a href=uploads/file/" . $row['file'] . ">" . $row['file'] . "</a>"; ?></h5> -->
                            <h5 class="card-title"><?php echo "<a href=uploads/file/" . $row['file'] . "><button class='btn btn-outline-secondary' style='float:right;'>View</button></a>"; ?></h5>
                            <p class="card-text"><?php echo $row['description'] ?></p>
                            <div class="mt-auto">
                            <a href="<?php echo 'uploads/file/' . $row['file']; ?>" class="btn btn-primary w-100" download>Download PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h1>Sorry no record Found</h1>";
        }
        ?>
    </div>
</div>

  <?php
 include("footer.php");
  ?>
</body>
</html>