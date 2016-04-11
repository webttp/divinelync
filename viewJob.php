<?php require "admin/config.php";
   $id=$_GET['id'];
   $fetchquery=$conn->query("select * from jobslist where id='$id'");
   $getrec=mysqli_fetch_object($fetchquery);
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
<!DOCTYPE HTML>
<html class="jdPage">
   <head>
      <link rel="stylesheet" type="text/css" href="http://static.naukimg.com/s/4/101/c/common_v27.min.css" media="all"/>
      <link rel="stylesheet" type="text/css" href="http://static.naukimg.com/s/4/121/c/jdStyle_v8.min.css" media="all"/>
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700" media="all"/>
   </head>
   <body class="_jdPage highlightable">
      <div class="wrap">
         <div class="jdSum inView">
            <div class="sumHd bnr">
               <div class="hdSec">
                  <h1 itemprop="title" class="small_title jobType hotjob">
                     <em>
                     </em> 
                     <?php echo $getrec->jobtitle ?>
                  </h1>
                  <div class="p">
                     <em class="expIcn"></em>
                     <span itemprop="experienceRequirements">
                     <?php echo  $getrec->minexperience."-".$getrec->maxexperience ?> yrs</span>
                     <em itemprop="jobLocation" itemscope itemtype="http://schema.org/Place" class="locIcn">
                     </em>
                     <div itemprop="name" class="loc">
                        <a title="Brand Manager Jobs in Coimbatore"><?php echo cityname($getrec->city,$conn); ?></a>  
                     </div>
                  </div>
               </div>
            </div>
            <div class="sumFoot">
               <span id="favId" class="fav" jid="231215007091">  <em></em></span>
               <span class="sal "><em></em> <?php echo $getrec->minsalary."-".$getrec->maxsalary ?>  P.A  </span> 
               <span>Openings: <strong><?php echo $getrec->noofopenings ?></strong></span>
            </div>
         </div>
         <div class="JD">
            <div class="abtSec">
               <h2 class="fl">Job Description</h2>
               <div class="fr">
                  <span class="sptr"></span>
               </div>
            </div>
            <ul itemprop="description" class="listing mt10"> 
               <?php echo $getrec->jobdescription ?> 
            </ul>
            <h4 class="jdHd small_title">Desired Candidate Profile</h4>
            <ul class="listing mt15"><?php echo $getrec->desiredprofile ?> </ul>
            <h5 class="small_title cpProf">Company Profile:</h5>
            <div itemprop="hiringOrganization" itemscope itemtype="http://schema.org/Organization" class="mt15 lH20 companyProfile">
               <?php echo $getrec->companyprofile ?> 
            </div>
         </div>
         <a href="javascript:void(0)" class="m
            t30 dspB f14 lH20" id="viewCont_trg">View Contact Details</a> 
         <div class="jDisc viewContact" id="viewContact"> </div>
         <div class="ltBx saQ" id="saQ"> </div>
      </div>
   </body>
</html>