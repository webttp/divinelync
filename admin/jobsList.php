<?php
require "config.php";
session_start();
if($_SESSION['loginid']=="")
{
	header("location:login.php?msg=userinvalid");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rechat HR Consulting - Admin</title>
        <link rel="stylesheet" type="text/css" href="utils/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="utils/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="css/global-style.css" />
				<style>		
		@import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");
		</style>
    </head>
    <body>
        <div class="container">
            <div class="navbar-header">
				<a class="navbar-brand" href="login.php">
					<img src="images/logo.png" alt="Rechat HR Consulting" title="Rechat HR Consulting" />        
				</a>
			</div>  
			<div class="row">
			
		       <div class="col-md-12"><span class="pull-right"><?php  echo 'Welcome   '. $_SESSION['loginname']; ?>
				   <a href="logout.php">Logout</a>
				   </span>
			   </div>
		    </div>
			<nav class= "navbar navbar-default" role= "navigation" >
				<div class= "navbar-header" >
					<a class="btn btn-lg btn-success" href="addNewJob.php"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add new Job</a>
				</div>
			</nav>
            <div class="row">
			    <div class="col-md-12">
			    <table class="table table-striped table-bordered">
						<thead>
						<th>S.No&nbsp;</th>
						<th>Job Title&nbsp;</th>
						<th>Job Experience&nbsp;</th>
						<th>No.of Openings&nbsp;</th>
						<th>Salary &nbsp;</th>
						<th>State &nbsp;</th>
						<th>City&nbsp;</th>
						<th>Job Description&nbsp;</th>
						 <th>Desired Profile&nbsp;</th>
						 <th>Company Profile&nbsp;</th>
						 <th>Action&nbsp;</th>
						</thead>
					<tbody>
					
		<?php 
		
		include("paginationscript.php");
		function statename($id,$conn)
		{
			$sql2 = <<<SQL
			SELECT * FROM `states` where state_id='$id'   
SQL;
			$result2 = $conn->query($sql2);
			$getrec2=mysqli_fetch_object($result2);
			return $getrec2->state_name;
		}
		function cityname($id,$conn)
		{
			$sql2 = <<<SQL
			SELECT * FROM `cities` where city_id='$id'   
SQL;
			$result2 = $conn->query($sql2);
			$getrec2=mysqli_fetch_object($result2);
			return $getrec2->city_name;
		}
    	$sno="0";
		$fetchquery=$conn->query("select * from ".$tablename." order by id desc limit $start,$limit");
		
		while($fetchrec=mysqli_fetch_object($fetchquery))
		{
			$sno++;	
			?>
            <tr >
                <td><?php echo  $sno; ?></td>
                <td><?php echo  $fetchrec->jobtitle ?></td>
                <td><?php echo  $fetchrec->minexperience."-".$fetchrec->maxexperience ?> Yrs</td>
				<td><?php echo  $fetchrec->noofopenings ?></td>
				<td>INR <?php echo $fetchrec->minsalary."-".$fetchrec->maxsalary ?></td>
                <td><?php echo statename($fetchrec->state,$conn); ?></td>
				<td><?php echo cityname($fetchrec->city,$conn); ?></td>
				<td><?php echo $fetchrec->jobdescription ?></td>
				<td><?php echo $fetchrec->desiredprofile ?></td>
				<td><?php echo $fetchrec->companyprofile ?></td>
                <td><a href="editJob.php?id=<?php echo $fetchrec->id;?>" class="btn">&nbsp;<i class="glyphicon glyphicon-edit"></i>&nbsp; Edit Job</a>
				<a  onclick="deleteConfirm(<?php echo $fetchrec->id;?>)" class="btn">&nbsp;<i class="glyphicon glyphicon-remove"></i>&nbsp; Delete Job</a></td>
            </tr>
			<?php
		}
			?>
        </tbody>
        </table>
		<div class="bs-example">
		<?php echo $pagination; ?>
        </div>
    </div>
   </div>
  </div>
        <script src="utils/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="utils/bootstrap-3.3.4-dist/js/bootstrap.min.js" type="text/javascript"></script>     
        <script src="scripts/global-script.js" type="text/javascript"></script>
    </body>
</html>
<script type="text/javascript">
function deleteConfirm(id)
{
	var result=confirm("Are you Sure to delete this Job?");
	if(result)
	{
		window.location.href="deleteJob.php?id="+id;
	}
}
</script>