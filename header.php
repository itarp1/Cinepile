<?php

include 'db.php'; 
include 'ft.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePlie</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Website Title Here</title>
  <style>
    body {
      background-color: #7393B3; /* Set background color to #7393B3 */
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    .content {
      padding: 20px;
    }
    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }
    .col {
      margin-bottom: 20px;
    }
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      border-radius: 5px;
      overflow: hidden;
    }
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .card-img-top {
      width: 100%;
      height: auto;
    }
    .card-body {
      text-align: center;
    }
    .card-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .card-text {
      font-size: 16px;
      color: #555;
      margin-bottom: 15px;
    }
    .btn {
      text-decoration: none;
      display: inline-block;
      padding: 8px 16px;
      margin-top: 10px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
    }
    .btn-primary {
      background-color: #726297;
      color: #fff;
      border: none;
    }
    .btn-secondary {
      background-color: #f0f0f0;
      color: #555;
      border: 1px solid #ccc;
    }
    .btn:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>




    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" style="height: 50px; width: auto; max-width: 100%;"></a>
        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Contact Us</a>
                </li>
            </ul>
            <!-- Search Form -->
            <form class="form-inline" method="post" action="searchmovie.php">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
                <button class="btn btn-success" name="submit" type="submit">Search</button>
            </form>
            <!-- Logout Button -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-outline-danger" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contact Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contact Form -->
                    <form action="valicontact.php" method="post">
                        <input type="text" required name="username" placeholder="Enter Your Name" class="form-control">
                        <br>
                        <input type="text" required name="email" placeholder="Enter Your Mail" class="form-control">
                        <br>
                        <input type="text" required name="msg" placeholder="Type Your Message" class="form-control">
                        <br>
                        <button name="csub" class="btn btn-" style="background-color: #726297;color: #fff;">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Categories -->
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="active">Category</a>
        <?php
        // Fetch categories from database and create navigation links dynamically
        $q1 = "SELECT * FROM category";
        $run = mysqli_query($con, $q1);
        if ($run) {
            while ($row = mysqli_fetch_assoc($run)) {
                // Encode category ID for URL
                $id = $row['id'];
                $enc1 = (($id * 123456789 * 54321) / 956783);
                $url = "category.php?id=" . urlencode(base64_encode($enc1));
                ?>
                <a href="<?php echo $url ?>"><?php echo $row['category_name']; ?></a>
                <?php
            }
        }
        ?>
        <!-- Responsive Icon for Mobile -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- Dynamic Genres -->
    <div class="topnav1" id="mytopnav1">
        <a href="index.php" class="active">Genre</a>
        <?php
        // Fetch genres from database and create navigation links dynamically
        $query = "SELECT * FROM genre";
        $run = mysqli_query($con, $query);
        if ($run) {
            while ($rows = mysqli_fetch_assoc($run)) {
                // Encode genre ID for URL
                $id = $rows['id'];
                $enc1 = (($id * 123456789 * 54321) / 956783);
                $url = "genre.php?id=" . urlencode(base64_encode($enc1));
                ?>
                <a href="<?php echo $url; ?>"><?php echo $rows['genre_name']; ?></a>
                <?php
            }
        }
        ?>
        <!-- Responsive Icon for Mobile -->
        <a href="javascript:void(0);" class="icon1" onclick="myFunction1()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- JavaScript libraries -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- Your custom scripts -->
    <script src="script.js"></script>

</body>
</html>
