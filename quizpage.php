<?php
   session_start();
   
   if(!isset($_SESSION['isloggedin'])){
   	header('location:login.html');
   }
   
   require_once "db_conne.php";
   $fname = $_SESSION['firstName'];
   $quizId = $_GET['quizId'];
   $title = $_GET['title'];
   $instructorId = $_GET['instructorId'];
   $k=1;

   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/quizpage.css">
</head>
<body>

<h3> Welcome to the <?php echo $title;?> Quiz <?php echo $fname;?><br/> </h3>

<form action="checked.php" method = "post">
<?php 
$query="SELECT * FROM questions where quizId = '$quizId' order by rand()";
$result=mysqli_query($con, $query);
$nbrows=mysqli_num_rows($result);

 for ($j = 0 ; $j < $nbrows ; $j++) {
            $row = mysqli_fetch_assoc($result);
            $questid = $row['questionId'];
            ?>
            <div class="questionanswer">

           
            <div class="question">
                <?php 
                 echo $k.": ";
                echo $row['question']."<br/>";
                ?>
            </div>
		    
            <?php

            $query2="SELECT * FROM answers where quizId = '$quizId' and questionId = '$questid' order by Rand() ";
            $result2=mysqli_query($con, $query2);
            $nbrows2=mysqli_num_rows($result2);

            for($i=0 ; $i < $nbrows2 ; $i++) {
                $row2 = mysqli_fetch_assoc($result2);
                $questionid = $row2['questionId'];
                $answid = $row2['answerId'];

                ?>
                <div class="answersclass">
                <input type="radio" name = "quizcheck[<?php echo $questionid;  ?>]" value = "<?php echo $answid;  ?>" required> 
                <?php
                echo $row2['answer']."</br>";
                ?>
                </div>  
                <?php
            } 
        ?>
            </div>
            <?php
            $k++;
        }
        ?>
       
    <div class="inputsubmit">
    <input type="submit" value = "Submit Your Answers">
    </div>
    
    <?php 
    $_SESSION['quizId'] = $quizId;
    $_SESSION['instructorId'] = $instructorId;

     ?>


</form>

</body>
</html>