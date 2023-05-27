<?php
   session_start();
   
   if(!isset($_SESSION['isloggedin'])){
   	header('location:login.html');
   }
   
   require_once "db_conne.php";
   $quizId = $_SESSION['quizId'];
   $instructorId = $_SESSION['instructorId'];
   $studentId = $_SESSION['id'];

   $result = 0;

   $count = count($_POST['quizcheck']);

   $selected = $_POST['quizcheck'];
   //echo print_r($selected);

   $key = array_keys($selected);
   $allkeys = [];

   for($j = 0 ; $j < $count ; $j++) {
       array_push($allkeys,$key[$j]);
   }

   $query = "Select * FROM questions where quizId = '$quizId'";
   $res = mysqli_query($con,$query);

   while ($rows = mysqli_fetch_assoc($res)) {
       
    //print_r ($rows['answerId']);
     echo "</br>";

         foreach($allkeys as $elements) {
               $checked = $rows['answerId'] == $selected[$elements];
        
               if ($checked) {
                        $result++;      
                   }
        
     }

}
   ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="css/score.css">
 </head>
 <body>
 <div class="container">
       <div class="score">
           Your Grade: <?php $grade = $result/$count * 100; echo round($grade,2). "/100";
           ?>
           <div class="gobac">
     <a href="quizzes.php"> Press Here to Go Back</a>
   </div>
       </div>
   </div>
   
 </body>
 </html>

 <?php 
 $addquery = "INSERT INTO scores(instructorId, quizId, studentId, score) 
 VALUES ('$instructorId','$quizId','$studentId','$grade')";
 //echo $addquery;
 $result = mysqli_query($con,$addquery);
  
 
 ?>



 
