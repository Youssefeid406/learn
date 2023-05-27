<?php
session_start();
require_once "db_conne.php";
$question = $_POST['question'];
$quizId = $_POST['quizId'];
echo $quizId;

$query = "INSERT INTO questions(QuizId, question, answerId) VALUES ('$quizId','$question','')";
$result = mysqli_query($con,$query);
echo $query;
header("location:choosequiztoedit.php");

?>
