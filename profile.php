<?php
session_start();
if ($_SESSION['isloggedin'] == 0) {
    header('location:login.html');
}

else {

	require_once "db_conne.php";
	$id = $_SESSION['id'];
	
	
		   $myquery="SELECT * FROM user where id='$id'";
			//echo $myquery;
			$result=mysqli_query($con, $myquery);
			$r = mysqli_num_rows($result);
	
			for ($j = 0 ; $j < $r ; ++$j) 
			{
				$row = mysqli_fetch_assoc($result);
				
				$fname = $row['firstName'];
				$lastname = $row['lastName'];
				$email = $row['email'];
				$age =  $row['age'];
				$gender =  $row['gender'];
				$pass =  $row['passwordHash'];
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
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/unicons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="css/tooplate-style.css">
	<link rel="stylesheet" href="css/p.css">
	<style>
		.i{
position:absolute;
left:43%;
top:2%;
height:100%;

		}
		</style>
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

              
            </div>
        </div>
    </nav>
<div>
	<form class = "sub-form" action="edit.php" method = "post">
	<h1>My Profile</h1>
	<label>First Name: </label>
		<input type="text" name = "fname" value = <?php echo $fname; ?> > <br>
	<label>Last Name: </label>
		<input type="text" name= "lname" value = <?php echo $lastname; ?> > <br>
	<label>Email: </label>
		<input type="text" name = "email" value = "<?php echo $email; ?>"> <br>
	<label>Age: </label>
		<input type="text" name = "age" value = "<?php echo $age; ?>"> <br>
	<label>Gender: </label>
		<input type="text" name = "gender" value = "<?php echo $gender; ?>">  </br>
		<input type="submit" value = "Save Changes" class = "sub">

	</form>
	</div>
</body>
</html>