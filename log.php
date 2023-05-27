<?php
require_once "db_conne.php";

if(isset($_POST['email']) 
	&& isset($_POST['pass']))
	{
      // print_r($_POST);
       $email=$_POST['email'];
       $pass=$_POST['pass'];

       $myquery="SELECT * FROM user where email='$email' AND passwordHash='$pass'";
	   //echo $myquery;
	    $result=mysqli_query($con, $myquery);
	    if(mysqli_num_rows($result)==0){
		header("location:login.html");

}else{
		$query="SELECT id FROM user where email='$email' AND passwordHash='$pass'";
		echo $myquery;

		 $result2=mysqli_query($con, $query);
		 $r = mysqli_num_rows($result2);

		for ($j = 0 ; $j < $r ; ++$j) 
		{
			$row = mysqli_fetch_assoc($result);
			
			$id = $row['id'];
			$fname = $row['firstName'];
		}

		session_start();

		$_SESSION['isloggedin']=1;
	    $_SESSION['email']=$email;
		$_SESSION['id'] = $id;
		$_SESSION['firstName'] = $fname;
	    header("location:index.php");
	}


	
	
}

?>