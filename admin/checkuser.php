<?php 
	require "config.php";
	session_start();
	if($_SESSION['loginid']=="")
	{
		header("location:login.php?msg=userinvalid");
	}
	if(isset($_POST['btnLogin'])=='Login' && $_POST['username']!="" && $_POST['password']!=""){
		// checking the username and password is available in the table users
		$password=md5($_POST['password']);
		$username=$_POST['username'];
		$sql = <<<SQL
			SELECT *
			FROM `users` where username='$username' and password='$password' 
SQL;
		$result = $conn->query($sql);
		//if more than zero hjsh
		if($result->num_rows > 0)
		{
			$getrec=mysqli_fetch_object($result);
			
			$_SESSION["loginid"] = $getrec->id;
			$_SESSION["loginname"] = $getrec->username;
			header("location:jobsList.php");
						
		}
		else
		{
			header("location:login.php?msg=userinvalid");
		}
	}				
?>
