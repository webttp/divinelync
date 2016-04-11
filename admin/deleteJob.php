<?php require "config.php";
session_start();
if($_SESSION['loginid']=="")
{
	header("location:login.php?msg=userinvalid");
}
$id=$_GET['id'];
$conn->query("DELETE FROM jobslist WHERE id=".$id);
$page="jobsList.php";
					echo '<script type="text/javascript">';
					echo 'window.location.href="'.$page.'";';
					echo '</script>';
 ?>
