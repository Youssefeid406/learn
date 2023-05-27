<?php
session_start();
require_once "db_conne.php";
$instructorId = $_SESSION['Instructor_Id'];
$title = $_POST['title'];
echo $title;

$query = "INSERT INTO quiz(title, instructorId) VALUES ('$title','$instructorId')";
$result = mysqli_query($con,$query);
header("location:choosequiztoedit.php");

?>

