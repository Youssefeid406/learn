<?php
require_once "db_conne.php";
session_start();
if ($_SESSION['instructor_loggedin'] == 0) {
    header('location:instructor_Login.html');
}
$instructorName = $_SESSION['Instructor_FirstName'];
$instructorID = $_SESSION['Instructor_Id'];
$instructorLastName = $_SESSION['Instructor_LastName'];
$k=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/choose.css">
</head>
<div class="insttitle">
<?php 
echo "Instructor Name: ".$instructorName." ". $instructorLastName;
echo "</br>";
echo "Instructor ID: ".$instructorID;
?>
<a href="logout.php" class = "logout">Logout</a>
</div>

<body>
<div class="container">
        <div class="name">
            Available Quizzes
        </div> 
            <div class="quiz">
                <table>
            <?php
            $query = "SELECT * FROM quiz WHERE instructorId = '$instructorID'";
            $result = mysqli_query($con,$query);
            $numofRows = mysqli_num_rows($result);
            for ($i=0; $i<$numofRows; $i++) {
                $row = mysqli_fetch_assoc($result);
                $quiztitle = $row['title'];
                $quizId = $row['QuizId'];
                ?>
                <tr>
                <td>
                <?php echo $k. ": ". $quiztitle;?> 
                </td>

                    <td>
                    <a class = "add" href="InsertQuestions.php?quizId=<?php echo $quizId;?>"> 
                        <svg xmlns="http://www.w3.org/2000/svg" 
                    width="26" height="26" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg> Add Questions </a>
                    </td>
                    
                
                    

                    <td>
                    <a class = "addanswers" href="insertanswers.php?quizId=<?php echo $quizId;?>">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    width="26" height="26" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    Add Answers</a>
                    </td>
                    <td>
   
                    <a class = "delete" href="deletepage.php?quizId=<?php echo $quizId;?>"> <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg> Delete Questions</a>
                    </td>
                     <td>
                     <a href="ViewGrades.php?quizId=<?php echo $quizId;?>" class = "grades"> <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                    <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                    <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                    <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/>
                    </svg>View Grades</a>
                     </td>

                     </td>
                     <td>
                     <a href="deletequiz.php?quizId=<?php echo $quizId;?>" class = "deletequiz"> 
                     <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                     Delete Quiz</a>
                     </td>

                   
              
                                
                   
                    
                </div>
                <?php
                $k++;
            }

            ?>
            </tr>
            </table>
            <div class="create">
            <a calss = "createquiz" href="addquiz.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg> 

            Create New Quiz</a>
            </div>
            
            </div>
    </div>

</body>
</html>







