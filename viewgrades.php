<?php
require_once "db_conne.php";
session_start();
if ($_SESSION['instructor_loggedin'] == 0) {
    header('location:instructor_Login.html');
}
$instructorName = $_SESSION['Instructor_FirstName'];
$instructorID = $_SESSION['Instructor_Id'];
$quizId = $_GET['quizId'];
//echo $quizId;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/grades.css">
</head>
<body>
<?php 
$gradesquery = "SELECT * FROM scores NATURAL JOIN instructor where quizId = $quizId";
$gradesresult = mysqli_query($con,$gradesquery);
$gradesnumrows = mysqli_num_rows($gradesresult);

?>
<div class="container">
<?php 
$gradesquery = "SELECT * FROM scores NATURAL JOIN instructor where quizId = $quizId";
$gradesresult = mysqli_query($con,$gradesquery);
$gradesnumrows = mysqli_num_rows($gradesresult);

?>
<div class="gradestable">
<table>
    <caption>Student Grades</caption>
    <th>
        Student ID
    </th>
    <th>
        score
    </th>
    <?php
for ($n=0; $n<$gradesnumrows; $n++) {
    $scoresrow = mysqli_fetch_assoc($gradesresult);
    $studentId = $scoresrow['studentId'];
    $score = $scoresrow['score'];
    ?>
    <tr>
        <td><?php echo $studentId;?></td>
        <td><?php echo $score?></td>
    </tr>
<?php
}
?>
</table>
</div>
    
</body>
</html>