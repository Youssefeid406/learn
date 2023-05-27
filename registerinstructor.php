<?php
require_once "db_conne.php";
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['pass'];


	if(isset($_POST['firstname']) 
	&& isset($_POST['lastname']) 
	&& isset($_POST['email']) 
	&& isset($_POST['pass']))
	{
		//print_r($_POST);
		$fn=$_POST['firstname'];
		$ln=$_POST['lastname'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];

		$myquery="INSERT INTO instructor(FirstName, LastName, email, password) VALUES ('$fn','$ln','$email','$pass')";
		echo $myquery;
		$result=mysqli_query($con, $myquery);
		if($result==FALSE) echo ("Error description: ".mysqli_error($con));
		header("location:instructor_Login.html");
	}
?>