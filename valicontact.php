<?php 

include 'header.php';
include 'ft.php';

if (isset($_POST['csub'])) {
	$name = $_POST['username'];
	$mail = $_POST['email'];
	$msg = $_POST['msg'];

	$query = "INSERT INTO `contactus`(`uname`, `mail`, `message`) VALUES ('$name','$mail','$msg')";
	$run = mysqli_query($con,$query);
	if ($run) {
		echo "<script>window.location.href='index.php';
		Swal.fire(
  'Request Submited',
  'We Review Your Request We work on it',
  'success',);

</script>";
	}
	else{
		echo "<script>window.location.href='index.php';Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  
})</script>";
	}
}
else{
	header('location:index.php');
}

 ?>