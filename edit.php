<?php
session_start();

require_once "db_conne.php";
$id = $_SESSION['id'];

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
//$pass = $_POST['pass'];
$age = $_POST['age'];
$gen = $_POST['gender'];




$myquery="UPDATE user SET firstName = '$firstname' 
, lastName = '$lastname' 
, email = '$email' , age = '$age' 
, gender = '$gen' WHERE id = '$id' ";

		echo $myquery;
		$result=mysqli_query($con, $myquery);
        header("location:profile.php");
        

?>