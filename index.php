<?php 

include 'header1.php';
include 'ft.php';
 ?>
  <meta charset="UTF-8">
  
<div class="content">
    <div class="row">
        
    
    <?php 

    $query = "SELECT * FROM movie";
    $run = mysqli_query($con,$query);
    if ($run) {

        while($row = mysqli_fetch_assoc($run)){
            ?>

<div class="col">
    <div class="card" style="width: 18rem;text-align: center;">
  <img class="card-img-top" height="300px" width="100px" src="thumb/<?php echo$row['img']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo$row['mv_name']; ?></h5>
    <p class="card-text"><?php echo$row['director']."<br>".$row['date']; ?></p>
    <?php 

    $id = $row['id'];
    $cal = (($id*123456789*54321)/956783);
    $url = "download.php?id=".urlencode(base64_encode($cal));
     ?>
    <a href="<?php echo$url; ?>" class="btn btn-" style="background-color:#726297; color: #fff;">Download</a>
    <a href="viewmovie.php?id=<?php echo$row['id']; ?>" class="btn btn-secondary">View Details</a>
  </div>
</div>
</div>

            <?php

        }

    }

     ?>
</div>
</div>


