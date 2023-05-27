<?php
require_once "db_conne.php";
session_start();
if ($_SESSION['instructor_loggedin'] == 0) {
    header('location:instructor_Login.html');
}
$instructorName = $_SESSION['Instructor_FirstName'];
$instructorID = $_SESSION['Instructor_Id'];
$quizId = $_GET['quizId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Questions</title>
    <link rel="stylesheet" href="css/insertquestions.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <label for="typequestion">
                Type the question you want to add in the field provided
            </label>
        <form action="addquestions.php" method = "POST">
            <input type="text" name = "question" required class = "textbox" placeholder = "Enter Question:"> 
            <input type="submit" value = "Add Question" class = "button">
            <input type="hidden" name = "quizId" value = "<?php echo $quizId;?>">
        </form>
    </div>
</div>
   
   
</body>
</html>
