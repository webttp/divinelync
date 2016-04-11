<?php include("header.php") ?>;
       <div class="row">
                <form class="jobSearch" action="currentOpenings.php" method="post">
                    <div class="form-group col-lg-4">
                        <label for="skills" class="text-muted">KeySkills, Designation</label>
                        <input type="text" id="skills" name="skills" placeholder="enter your areas of expertise" class="form-control" />
                    </div>
                     <div class="form-group col-lg-3">
                        <label for="location" class="text-muted">Desired Location</label>
                        <input type="text" id="location" name="location" placeholder="where you wish to work" class="form-control" />
                    </div>
                    <div class="form-group col-lg-1">
                        <label for="experience" class="text-muted">Experience</label>
                        <select type="text" id="experience" name="experience" class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>                            
                        </select>
                    </div>                    
                    <div class="col-lg-1">
                        <div class="form-group">
                             <label for="minSalary" class="text-muted">Min Salary</label>
                                <select type="text" id="minSalary" name="minSalary" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>                            
                                </select> 
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                         <label for="maxSalary" class="text-muted">Max Salary</label>
                        <select type="text" id="maxSalary" name="maxSalary" class="form-control maxSalarySelectBox">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>                            
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" name="submit" value="ss" class="btn btn-primary btn-lg">Submit</button>
                    </div>                    
                </form>                
            </div>
			<?php include("paginationscript.php"); 
			
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
			?>
			<div class="row">
                <div class="col-lg-8">
					<?php
					if($_POST['submit']=="ss")
					{
						if($_POST['location']!="")
						{
							$location=$_POST['location'];
						}
						if($_POST['skills']!="")
						{
							$skills=$_POST['skills'];
						}
						$fetchquery=$conn->query("select a.jobtitle,a.noofexperience,a.jobdescription,a.desiredprofile,
												  a.companyprofile,a.state,a.city from jobslist a, cities b where a.city=b.city_id and 
												  b.city_name like '%$location%' or a.jobtitle like '%$skills%'
												  order by a.id desc limit $start,$limit");
					}
					else
					{
						$fetchquery=$conn->query("select * from ".$tablename." order by id desc limit $start,$limit");
					}	
					if($_GET['city_id']!="")
					{
						$fetchquery=$conn->query("select a.jobtitle,a.noofexperience,a.jobdescription,a.desiredprofile,
												  a.companyprofile,a.state,a.city from jobslist a, cities b where a.city=b.city_id and 
												  b.city_id='$_GET[city_id]' 
												  order by a.id desc limit $start,$limit");
					}
					while($fetchrec=mysqli_fetch_object($fetchquery))
					{
						?>	
						<div class="panel">
							<div class="panel-body">                            
								<a target="_blank" href="viewJob.php?id=<?php echo $fetchrec->id?>"><?php echo  $fetchrec->jobtitle ?></a>
								<p class="text-muted">
									<span class="glyphicon glyphicon-briefcase"></span> 
									<span><?php echo  $fetchrec->minexperience."-".$fetchrec->maxexperience ?>  Yrs.</span>
									<span class="glyphicon glyphicon-map-marker"></span> 
									<span><?php echo statename($fetchrec->state,$conn); ?> - <?php echo cityname($fetchrec->city,$conn); ?>
									</span>
								</p>
								<p class="text-muted"><?php echo $fetchrec->jobdescription ?></p>
								<a target="_blank" href="viewJob.php?id=<?php echo $fetchrec->id?>" class="small">View More</a>			
							</div>
						</div>
						<?php
					}
					?>
				</div>
            </div>
			<div >
			Jobs By Location
			<?php 
			$sql2 = <<<SQL
			select count(a.id) as cnt, b.city_id,b.city_name from jobslist a, cities b where a.city=b.city_id group by city_name
SQL;
			$result2 = $conn->query($sql2);
			while($getrec2=mysqli_fetch_object($result2))
			{
			?>
			<div>
					<a href="currentOpenings.php?city_id=<?php echo $getrec2->city_id ?>">
						<span>
							<?php echo $getrec2->city_name ?> <?php echo $getrec2->cnt?>
						</span>
					</a>
					
				</div>
			<?php 
			}?>
		
			</div>
			
			<div >
			Jobs By Role
			</div>
			
			<div class="bs-example">
				<?php echo $pagination; ?>
			</div>
			
            <div class="center-block text-center text-muted">
			<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</small>
			<footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
			</div>
			</div>
			<script src="admin/utils/jquery-1.11.2.min.js" type="text/javascript"></script>
			<script src="admin/utils/bootstrap-3.3.4-dist/js/bootstrap.min.js" type="text/javascript"></script>     
			<script src="admin/scripts/global-script.js" type="text/javascript"></script>
    </body>
</html>
