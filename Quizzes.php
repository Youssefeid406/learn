<?php 
session_start();
require_once "db_conne.php";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course PHP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/unicons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <link rel="stylesheet" href="css/Quizzes.css">
</head> 
<!-- body -->
<body class="main-layout">
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">FREE COURSES</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
                <ul class="navbar-nav ml-lg-auto">
                    <div class="ml-lg-4">
                      <div class="color-mode d-lg-flex justify-content-center align-items-center">
                        <i class="color-mode-icon"></i>
                      
                      </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    
    <?php
    $query = "SELECT * from quiz";
    $result = mysqli_query($con,$query);
    $numofros = mysqli_num_rows($result);

    for ($i=0;$i<$numofros;$i++) {
        $row = mysqli_fetch_assoc($result); 
        $quizname = $row['title'];
        $quizId = $row['QuizId'];
        $instructorID = $row['instructorId'];
        ?>
        <h1><?php echo $quizname. " Quiz";?> <a href="quizpage.php?quizId=<?php echo $quizId;?>&title=<?php echo $quizname;?>&instructorId=<?php echo $instructorID;?>" class="Quizzes">OPEN QUIZ</a></h1>
        <?php
    }

    ?>
    <br><br><br><br><br><br><br><br>
        <!-- FOOTER -->
       <footer class="footer py-5">
          <div class="container">
               <div class="row">

                    <div class="col-lg-12 col-12">                                
                        <p class="copyright-text text-center">Copyright &copy; MAJD HIJAZI ABDULKAREEM KORT</p>
                        <p class="copyright-text text-center">Designed by <a rel="nofollow" href="#"> MAJD HIJAZI<strong> & </strong> ABDULKAREEM KORT</a></p>
                    </div>
                    
               </div>
          </div>
     </footer>

   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/Headroom.js"></script>
   <script src="js/jQuery.headroom.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/smoothscroll.js"></script>
   <script src="js/custom.js"></script>

</body>
</html>