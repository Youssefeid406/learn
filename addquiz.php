<?php
require_once "db_conne.php";
session_start();
if ($_SESSION['instructor_loggedin'] == 0) {
    header('location:instructor_Login.html');
}
$instructorName = $_SESSION['Instructor_FirstName'];
$instructorID = $_SESSION['Instructor_Id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <link rel="stylesheet" href="css/addquiz.css">

</head>
<body>
    <div class="container">
    <h1 calss = "title">Create New Quiz </h1>
        <div class="createquiz">
            
            <form action="createquiz.php" method = "POST">
                <span>Enter Quiz Title: </span>
                <input type="text" placeholder = "Enter Quiz Title" name = "title" required>
                <input type="submit">
            </form>
        </div>
    </div>

</body>
</html>