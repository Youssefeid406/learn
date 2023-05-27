<?php
require_once "db_conne.php";

if(isset($_POST['email']) && isset($_POST['pass']))
	{
      
       $email=$_POST['email'];
       $pass=$_POST['pass'];

       $myquery="SELECT * FROM instructor where email='$email' AND password='$pass'";
	
	    $result=mysqli_query($con, $myquery);
	    if(mysqli_num_rows($result)==0){
		header("location:instructor_Login.html");

}else{
		$query="SELECT InstructorId FROM instructor where email='$email' AND password='$pass'";

		 $result2=mysqli_query($con, $query);
		 $r = mysqli_num_rows($result2);

		for ($j = 0 ; $j < $r ; ++$j) 
		{
			$row = mysqli_fetch_assoc($result);
			
			$id = $row['InstructorId'];
			$fname = $row['FirstName'];
            //$quizId = $row['QuizId'];
			$lastname = $row['LastName'];
		}

		session_start();

		$_SESSION['instructor_loggedin']=1;
	    $_SESSION['instructor_email']=$email;
		$_SESSION['Instructor_Id'] = $id;
		$_SESSION['Instructor_FirstName'] = $fname;
        //$_SESSION['Instructor_QuizId'] = $quizId;
		$_SESSION['Instructor_LastName'] = $lastname;



	    header("location:choosequiztoedit.php");
	}
	
}

?>