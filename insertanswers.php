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
    <title>Add ANswers</title>
    <link rel="stylesheet" href="css/insertanswers.css">
</head>
<body>
<div class="container">
        <div class="title">
            <label for="AddAnswers">
            Add answers to your questions.
            </label>
            <div class="questionchoices">
            Choose Question: 
            <form action="addanswers.php" method = "POST">
            <select name = "answer" calss = "selectordesign">
            <?php
            $query3 = "SELECT * FROM questions where quizId = '$quizId'";
            $result3 = mysqli_query($con,$query3);
            $numofrows3 = mysqli_num_rows($result3);
            
            for ($i = 0; $i<$numofrows3;$i++) {
                $row3 = mysqli_fetch_assoc($result3);
                $questionId = $row3['questionId'];
                $question = $row3['question'];
                ?>

                <option value="<?php echo $questionId; ?>"> <?php echo $question;?> </option>
                <?php
            }
                ?>
        </select>
        
            </div>
           
       <div class="answerinput">
           <input type="text" name = "answertext" placeholder = "Enter choice here" required class = "inbox">
           <div class="check">
           <input type="checkbox" name = "correct" id = "1"> <label for="1" class = "small">Correct?</label>
           </div>
               
       </div>

       <input type="submit" vlaue = "ADD">
       <input type="hidden" name = "quizID" value = "<?php echo $quizId;?>">
   </form>
    </div>
</div>
    

</body>
</html>
