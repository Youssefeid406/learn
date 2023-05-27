<?php
session_start();
if ($_SESSION['isloggedin'] == 0) {
    header('location:login.html');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>learn</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/unicons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">FREE COURSES</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                      <a href="Quizzes.php" class="nav-link"><span data-hover="QUIZZES">QUIZZES</span></a>
                  </li>
                  
                   
                </ul>

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
    <div class="c">
        <div class="card">
          <div class="box">
            <div class="content">
            
              <h3>HTML</h3>
          
              <a href="coursehtml.html">Start</a>
            </div>
          </div>
        </div>
      
        <div class="card">
          <div class="box">
            <div class="content">
            
              <h3>CSS</h3>
              
              <a href="coursecss.html">Start</a>
            </div>
          </div>
        </div>
      
        <div class="card">
            <div class="box">
              <div class="content">
              
                <h3>JS</h3>
               
                <a href="coursejs.html">Start</a>
              </div>
            </div>
          </div>

        <div class="card">
          <div class="box">
            <div class="content">
             
              <h3>PHP</h3>
             
              <a href="coursephp.html">Start</a>
            </div>
          </div>
        </div>
      </div>
    
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