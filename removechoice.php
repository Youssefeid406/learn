<?php
require_once 'db_conne.php';
session_start();
//$question_ID = $_GET['questionId'];
//echo $question_ID;
$answerId = $_GET['answerId'];
//echo $answerId;


$query = "DELETE FROM answers WHERE answerId = '$answerId' ";
echo $query;

if ($result = mysqli_query($con,$query)) {
    echo "updated succefully";
    header("location:choosequiztoedit.php");
}
else {
    echo "failed to delete";
}
?>