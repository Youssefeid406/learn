<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Questions</title>
    <link rel="stylesheet" href="css/quizadmin.css">
</head>
<body>
<?php 
session_start();
require_once "db_conne.php";
$quizId = $_GET['quizId'];
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
                $answerId = $row2['answerId'];
                ?>
                <div class="answerstextbox">
                <input type="text" value = "<?php echo $row2['answer'];?>">
                <a href="removechoice.php?answerId=<?php echo $answerId;?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg></a>
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