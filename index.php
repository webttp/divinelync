<?php include("header.php") ?>;

<div class="row">
                <div class="col-lg-8">
                    <h3 class="text-info">Welcome to Rechat HR Consulting</h3>
                    <p class="text-muted">We Rechat HR consulting cater to the recruitment needs of organisations from across Industries through out India and International locations. We understand the job requirement completely and appreciate that, it is the human resource that forms the backbone of an organisation’s success.  We attempts to carve a niche in the placement industry and strives to make a difference to the quality of your staff, by increasing the overall productivity and the talent pool of the company.</p>
                    <h3 class="text-info">Jobs</h3> 
					<div class="row">
					<div class="col-lg-6">
						<ul class="list-group">
						<?php
						 function cityname($id,$conn)
						{
							$sql2 = <<<SQL
							SELECT * FROM `cities` where city_id='$id'   
SQL;
							$result2 = $conn->query($sql2);
							$getrec2=mysqli_fetch_object($result2);
							return $getrec2->city_name;
						}
						$fetchquery=$conn->query("select * from jobslist order by addedon desc limit 0,3");
						while($fetchrec=mysqli_fetch_object($fetchquery))
						{
							?>
							<li class="list-group-item panel">
								<a target="_blank" href="viewJob.php?id=<?php echo $fetchrec->id?>"><?php echo $fetchrec->jobtitle?></a>
									<ul class="list-inline text-muted">
										<li>
											<span class="glyphicon glyphicon-briefcase"></span> 
											<span> 
												<?php echo  $fetchrec->minexperience."-".$fetchrec->maxexperience ?>  Yrs.
											</span>
										</li>
										<li>
											<span class="glyphicon glyphicon-map-marker"></span>
											<span> 
												<?php echo cityname($fetchrec->city,$conn);?>
											</span>
										</li>
									</ul>
							</li>
							<?php 
						}
						?>
						</ul>
					</div>
				    <div class="col-lg-6">
						<ul class="list-group">
							<?php
							$fetchquery=$conn->query("select * from jobslist order by addedon desc limit 3,3");
							while($fetchrec=mysqli_fetch_object($fetchquery))
							{
								?>
								<li class="list-group-item panel">
									<a target="_blank" href="viewJob.php?id=<?php echo $fetchrec->id?>"><?php echo $fetchrec->jobtitle?></a>
									<ul class="list-inline text-muted">
										<li>
											<span class="glyphicon glyphicon-briefcase"></span> 
											<span> <?php echo  $fetchrec->minexperience."-".$fetchrec->maxexperience ?>  Yrs.</span>
										</li>
										<li>
											<span class="glyphicon glyphicon-map-marker">
											</span> <span> <?php echo cityname($fetchrec->city,$conn);?></span>
										</li>
									</ul>
								</li>
								<?php 
							}
							?>
						</ul>
					</div>
					</div>
					<p><a href="currentOpenings.php" class="pull-right">View All</a></p>
                </div>
                <div class="col-lg-4">
                    
                </div>
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
