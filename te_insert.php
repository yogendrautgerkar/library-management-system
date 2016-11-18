<?php 

require 'newcon.php';

$name=$_POST['name'];
$designation=$_POST['designation'];
$dept= $_POST['dept'];
$email=$_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$select=mysqli_query($link,"select * from te_registration");
  $row=mysqli_fetch_array($select);
  $user=$row['username'];
  if ($user==$_POST['username'])
  {
  	echo "User name is Already Taken";
  }
  else{
  	$stmt=mysqli_query($link,"insert into te_registration(name, designation, dept, email, username, password) 
		values('$name','$designation','$dept','$email','$username','$password')");
	header('location:index.php');
		
}


?>