<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Admin</title>
    <link rel="stylesheet" href="css/quizadmin.css">
</head>
<body>
<?php 
session_start();
require_once "db_conne.php";
$quizId = $_POST['availablequizzes'];

if ($_SESSION['instructor_loggedin'] == 0) {
    header('location:instructor_Login.html');
}

$fname = $_SESSION['Instructor_FirstName'];
$instructorId = $_SESSION['Instructor_Id'];
?>

<div class="title">
    Edit Quiz
</div>

<?php
$k = 1;
$query = "SELECT * FROM questions NATURAL JOIN instructor where instructorId='$instructorId' and quizId = '$quizId'";
$result = mysqli_query($con,$query);
$numofrows = mysqli_num_rows($result);

for ($i = 0; $i<$numofrows;$i++) {
    $row = mysqli_fetch_assoc($result);
    $questionId = $row['questionId'];
    ?>
    <div class="question">
        <div class="questtext">
        <?php echo $k. ": ".$row['question'];?>
        </div>
         
        <div class="answers">
            <?php 
            $query2 = "SELECT * FROM answers NATURAL JOIN instructor where instructorId='$instructorId' and questionId = '$questionId'";
            $result2 = mysqli_query($con,$query2);
            $numofrows2 = mysqli_num_rows($result2);

            for($j=0; $j<$numofrows2; $j++) {
                $row2 = mysqli_fetch_assoc($result2);
                ?>
                <div class="answerstextbox">
                <input type="text" value = "<?php echo $row2['answer'];?>"> <br>

                </div>
               
                <?php
                
            }
            ?>
            <div class="deletehref">
            <a href="deleteQuestion.php?questionId=<?php echo "$questionId";?>" onclick = "return confirm('Are you sure you want to delete this question?')">Delete this Question</a>
    
            </div>
            
            <?php
            ?>

        </div>
    </div>
    

<?php
$k++;
}
?>
<hr>
<div class="addquestions">
    <div class="addnewtitle">
    <h4>Add new questions to your test! <br></h4>
    <div class="typequestion">
    <h5>Type the question you want to add in the field below.</h5>

    </div>
    </div>
   
    <div class="formaddquestions">
    <form action="addquestions.php" method = "POST">
        <div class="textinput">
        <input type="text" name = "question" required> 
        <input type="submit" value = "Add Question">
        <input type="hidden" name = "quizID" value = "<?php echo $quizId;?>">
        
        </div>   
    </form>
    </div>
</div>

<hr>

<div class="addanswers">
    <h4>Add answers to your questions.</h4>
    <h5>Choose which question you want to add choices to.</h5> 
    <form action="addanswers.php" method = "POST">
        <select name = "answer">
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
        <h4>Enter a choice for the question you picked.</h4> 
        <div class="answerinput">
            <input type="text" name = "answertext" placeholder = "Enter choice here" required>
            <label for="check">
                <input type="checkbox" name = "correct"> Check this box if you wish to choose this
                 option as the correct answer to the question you picked?
            </label>
        </div>

        <input type="submit" vlaue = "ADD">
        <input type="hidden" name = "quizID" value = "<?php echo $quizId;?>">
    </form>
</div>    

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