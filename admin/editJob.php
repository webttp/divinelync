<?php require "config.php";
session_start();
if($_SESSION['loginid']=="")
{
	header("location:login.php?msg=userinvalid");
}
$id=$_GET['id'];
$fetchquery=$conn->query("select * from jobslist where id='$id'");
$getrec=mysqli_fetch_object($fetchquery);


 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rechat HR Consulting - Admin</title>
        <link rel="stylesheet" type="text/css" href="utils/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="utils/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="css/global-style.css" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>          
          <script src="../utils/html5shiv.min.js"></script>
          <script src="../utils/respond.min.js"></script>
        <![endif]--> 
	</head>
    <body>
        <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-header">
						<a class="navbar-brand" href="login.php">
							<img src="images/logo.png" alt="Rechat HR Consulting" title="Rechat HR Consulting" />    
						</a>
					</div>
				</div>				
			</div>	
			<div class="row">
				<div class="col-md-12">
					<a class= "navbar-brand" href= "jobsList.php"><i class="glyphicon glyphicon-th-large"></i> Jobs List </a>
				</div>	
			</div>	
			<div class="row">
				<div class="col-md-12">
					<form role="form" name="myForm" method="post" class="form-horizontal" action="editJob.php" onSubmit="javascript:return check_input()">
					<input type="hidden" value="<?php echo $_GET['id'];?>" name="hiddenjobid">
					<div class="row">
					<div class= "form-group" ng-class="{error: myForm.name.$invalid}">
					<label class= "col-md-2"> Job Title </label>
					<div class="col-md-4">
					<input name="jobtitle"  type= "text" class= "form-control" placeholder="Job Title" value="<?php echo $getrec->jobtitle?>" required/>
					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2"> Job Experience </label>
					<div class="col-md-4">
					<input name="minexperience" id="minexperience"  type= "text" class= "form-control" placeholder="Min Experience" value="<?php echo $getrec->minexperience  ?>" required/>
					to 
					<input name="maxexperience" id="maxexperience"   type= "text" class= "form-control" placeholder="Max Experience" value="<?php echo $getrec->maxexperience?>" required/>
					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2"> Salary </label>
					<div class="col-md-4">
					<input name="minsalary" id="minsalary" type= "number" min="1" class= "form-control" placeholder="Minimum salary" value="<?php echo $getrec->minsalary?>"/>
					to 
					<input name="maxsalary" id="maxsalary" type= "number"  min="1" class= "form-control" placeholder="Maximum salary" value="<?php echo $getrec->maxsalary ?>"/>
					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2"> No.of Openings </label>
					<div class="col-md-4">
					<input name="noofopenings" min="1" id="noofopenings" type= "number" class= "form-control" placeholder="no of openings" value="<?php echo $getrec->noofopenings?>" required/>
					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2"> State </label>
					<div class="col-md-4">
					<select class="form-control" id="state" name="state" required>
					<option value="">Select State</option>
						<?php 
						$query = $conn->query("SELECT * FROM states where status = 1 ORDER BY state_name ASC");
						//Count total number of rows
						$rowCount = $query->num_rows;
						//Display cities list
						if($rowCount > 0){
							while($row = mysqli_fetch_object($query)){ 
							?>
								<option value="<?php echo $row->state_id ?>"  <?php if($row->state_id==$getrec->state){echo "selected=selected";} ?> >
								<?php echo $row->state_name ?>
								</option>
								<?php
							}
						}
						?>
					</select>
					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2"> City</label>
					<div class="col-md-4">
					<select class="form-control" id="city" name="city" required>
						<option value="">Select state first</option>
						<?php 
						$query = $conn->query("SELECT * FROM cities where status = 1 ORDER BY city_name ASC");
						//Count total number of rows
						$rowCount = $query->num_rows;
						//Display cities list
						if($rowCount > 0){
							while($row = mysqli_fetch_object($query)){ 
							?>
								<option value="<?php echo $row->city_id ?>"  <?php if($row->city_id==$getrec->city){echo "selected=selected";} ?> >
								<?php echo $row->city_name ?>
								</option>
								<?php
							}
						}
						?>
					</select>
					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2"> Job Description </label>
					<div class="col-md-4">
					<textarea name="jobsdescription"  rows="10" cols="20" class= "form-control" placeholder="Enter jobsdescription" required ><?php echo $getrec->jobdescription?></textarea>
					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2"> Desired Profile</label>
					<div class="col-md-4">
					<textarea name="desiredprofile" rows="10" cols="20"  class= "form-control" placeholder="Enter desired profile" required ><?php echo $getrec->desiredprofile?></textarea>
					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2">Company Profile</label>
					<div class="col-md-4">
					<textarea name="companyprofile"  rows="10" cols="20" class= "form-control" placeholder="Enter company profile" required ><?php echo $getrec->companyprofile?></textarea>
   					</div>
					</div>
					<div class= "form-group">
					<label class= "col-md-2"></label>
					<div class="col-md-4">
					<button name="submit" class="btn btn-primary">Submit</button>
					<a href="jobsList.php" class="btn">Cancel</a> 
					</div>
					</div>
					</div>
					</form>
				</div>
            </div>
        </div>
        <script src="utils/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="utils/bootstrap-3.3.4-dist/js/bootstrap.min.js" type="text/javascript"></script>     
        <script src="scripts/global-script.js" type="text/javascript"></script>
    </body>
</html>
<?php 
	if(isset($_POST['submit'])!=""){
				$result = $conn->query("update jobslist SET jobtitle='$_POST[jobtitle]',minexperience='$_POST[minexperience]',maxexperience='$_POST[maxexperience]',noofopenings='$_POST[noofopenings]',minsalary='$_POST[minsalary]',maxsalary='$_POST[maxsalary]',jobdescription='$_POST[jobsdescription]',desiredprofile='$_POST[desiredprofile]',companyprofile='$_POST[companyprofile]',state='$_POST[state]',city='$_POST[city]' where id='$_POST[hiddenjobid]'");
				if($result){
					$page="jobsList.php";
					echo '<script type="text/javascript">';
					echo 'window.location.href="'.$page.'";';
					echo '</script>';
				}
	}				
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
function check_input()
{
		var minexp=document.getElementById('minexperience').value;
		if(minexp=="")
		{
				alert("Please Enter the minexp");
				document.getElementById('minexperience').value="";
				document.getElementById('minexperience').focus();
				return false;	
		}
		if(minexp!="")
		{
				var re=/^[0-9]+$/; 
				if(!re.test(document.getElementById('minexperience').value) )
				{ 
				alert("Please input numeric characters only"); 
				document.getElementById('minexperience').value="";
				document.getElementById('minexperience').focus();
				return false;		
		 		}
		}	 
		var maxexp=document.getElementById('maxexperience').value;
		if(maxexp=="")
		{
				alert("Please Enter the maxexp");
				document.getElementById('maxexperience').value="";
				document.getElementById('maxexperience').focus();
				return false;	
		}
		if(maxexp!="")
		{
				var re=/^[0-9]+$/; 
				if(!re.test(document.getElementById('maxexperience').value) )
				{ 
					alert("Please input numeric characters only"); 
					document.getElementById('maxexperience').value="";
					document.getElementById('maxexperience').focus();
					return false;		
		 		}
		}
		if(minexp!="" && maxexp!="")
		{
				if(parseInt(minexp) > parseInt(maxexp))
				{
					alert("Minimum experience years should not greater than Maximum Years"); 
					document.getElementById('minexperience').value="";
					document.getElementById('maxexperience').value="";
					document.getElementById('minexperience').focus();
					return false;		
				}
				else if(parseInt(minexp)==parseInt(maxexp))
				{
		   			alert("Minimum experience years should not equal Maximum Years"); 
					document.getElementById('minexperience').value="";
					document.getElementById('maxexperience').value="";
					document.getElementById('minexperience').focus();
					return false;	
				}
		}
		var minsalary=document.getElementById('minsalary').value;
		var maxsalary=document.getElementById('maxsalary').value;
		if(minsalary!="" && maxsalary!="")
		{
				if(parseInt(minsalary) > parseInt(maxsalary))
				{
					alert("Minimum salary should not greater than Maximum salary"); 
					document.getElementById('minsalary').value="";
					document.getElementById('maxsalary').value="";
					document.getElementById('minsalary').focus();
					return false;		
				}
				else if(parseInt(minsalary)==parseInt(maxsalary))
				{
		   			alert("Minimum salary should not equal Maximum salary"); 
					document.getElementById('minsalary').value="";
					document.getElementById('maxsalary').value="";
					document.getElementById('minsalary').focus();
					return false;	
				}
		}
}		
</script>