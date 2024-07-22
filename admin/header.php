<?php 
include 'db.php';
include 'ft.php';
session_start();
if (isset($_SESSION['loginsuccesfull'])) {}
	else{
		echo "<script>alert('You Are not Logged in');window.location.href='login.php';</script>";
		
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - CinePile</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
body {
  margin: 0;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #140d14;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #140d14;
  color: white;
}
.container{
  margin-left: 200px;
  padding:10px;
}
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}


.pagination {
  margin: 20px 0 5px 0;
  text-align: center;
}

.pagination a {
  display: inline-block;
  padding: 8px 16px;
  text-decoration: none;
  color: #000;
  border: 1px solid #ddd;
  margin: 0 4px;
  border-radius: 4px;
}

.pagination a.active {
  background-color: #007bff;
  color: #fff;
  border-color: #007bff;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
}

.table-search {
  display: flex;
  justify-content: space-between;
  margin: 20px;
}
#search-input {
  outline: none;
  padding: 5px;
  border-radius: 5px;
}
</style>
</head>
<body>

<!-- nav -->
<div class="container">
  <img src="img/logo.png" style="height: 100px; width: auto; max-width: 100%">
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Hello,<?php echo $_SESSION['user']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>
<!-- navend -->
<div class="sidebar">
  <a class="active" href="index.php">Home</a>
  <a href="movielist.php">Movies</a>
  <a href="contact.php">Contact</a>
  <a href="user.php">User</a>

  <a href="adminlist.php">Admins</a>
  <a href="categorylist.php">Categories</a>
  <a href="genrelist.php">Genre</a>

</div>

