<?php
require_once "db_conne.php";
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$email = $_POST['email'];
	$number = $_POST['age'];
	$password = $_POST['pass'];
	//$cpassword = $_POST['cpassword'];
	$gender = $_POST['gender'];


	if(isset($_POST['firstname']) 
	&& isset($_POST['lastname']) 
	&& isset($_POST['email']) 
	&& isset($_POST['age']) 
	&& isset($_POST['pass']) 
	//&& isset($_POST['cpass']) 
	&& isset($_POST['gender']))
	{
		//print_r($_POST);
		$fn=$_POST['firstname'];
		$ln=$_POST['lastname'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		//$fn=$_POST['cpassword'];
		$gen=$_POST['gender'];
		$age=$_POST['age'];
		

		
		$myquery="INSERT into user (firstName, lastName, email, age, gender, passwordHash) VALUES ('$fn','$ln','$email','$age','$gen','$pass')";
		echo $myquery;
		$result=mysqli_query($con, $myquery);
		if($result==FALSE) echo ("Error description: ".mysqli_error($con));
		header("location:login.html");
	}
?>