<?php
require_once 'db_conne.php';
session_start();
$quizId = $_GET['quizId'];
echo $quizId;

$query = "DELETE FROM quiz WHERE QuizId = '$quizId'" ;
if ($result = mysqli_query($con,$query)) {
    header("location:choosequiztoedit.php");
}
else {
    echo "failed to delete";
}
?>