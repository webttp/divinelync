<?php require "admin/config.php" ?>;
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rechat HR Consulting</title>
        <link rel="stylesheet" type="text/css" href="admin/utils/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="admin/utils/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="admin/css/global-style.css" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>          
          <script src="../utils/html5shiv.min.js"></script>
          <script src="../utils/respond.min.js"></script>
        <![endif]-->
		<style>		
		@import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");
		</style>
    </head>
    <body>
        <div class="container">
           <div class="navbar-header">
				<a class="navbar-brand" href="../index.php">
					<img src="admin/images/logo.png" alt="Rechat HR Consulting" title="Rechat HR Consulting" />        
				</a>
			</div>            
			<div class="header clearfix">
			<ul class="nav nav-pills pull-right">                                                                          
				<li role="presentation" class="active"><a href="index.php">Home</a></li>
				<li role="presentation"><a href="about.php">About Us</a></li>
				<li role="presentation"><a href="currentOpenings.php">Current Openings</a></li>
				<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
					Services <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
				<li role="presentation"><a href="executiveSearch.php">Executive Search</a></li>
				<li role="presentation"><a href="headHunting.php">Head Hunting</a></li>
				<li role="presentation"><a href="campusRecruitment.php">Campus Recruitment</a></li>
				<li role="presentation"><a href="index.php">Training Service</a></li>
				</ul>
				</li>
					<li role="presentation"><a href="#">Careers</a></li>
					<li role="presentation"><a href="contactUs.php">Contact Us</a></li>
				</ul>  
				</div>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
				<div class="item active">
				<img src="images/image2.jpg" alt="...">
					<div class="carousel-caption">
					...
					</div>
				</div>
				<div class="item">
					<img src="images/image3.jpg" alt="...">
					<div class="carousel-caption">
					...
					</div>
				</div>
       <div class="item">
          <img src="images/image4.jpg" alt="...">
        <div class="carousel-caption">
          ...
        </div>
      </div>
      
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>     