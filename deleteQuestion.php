<?php
require_once 'db_conne.php';
session_start();
$question_ID = $_GET['questionId'];
echo $question_ID;

$query = "DELETE FROM questions WHERE questionId = '$question_ID' ";
if ($result = mysqli_query($con,$query)) {
    echo "updated succefully";
    header("location:choosequiztoedit.php");
}
else {
    echo "failed to delete";
}
?>