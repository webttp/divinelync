<?php require "config.php"; ?>
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
		<style type="text/css">
		@import "bourbon";
		.wrapper {	
				margin-top: 80px;
				margin-bottom: 80px;
		}
		.form-signin {
			max-width: 380px;
			padding: 15px 35px 45px;
			margin: 0 auto;
			background-color: #fff;
			border: 1px solid rgba(0,0,0,0.1);  
			.form-signin-heading,
			.checkbox {
				margin-bottom: 30px;
			}
			.checkbox {
				font-weight: normal;
			}
			.form-control {
				position: relative;
				font-size: 16px;
				height: auto;
				padding: 10px;
				@include box-sizing(border-box);
				&:focus {
					z-index: 2;
				}
			}
			input[type="text"] {
				margin-bottom: -1px;
				border-bottom-left-radius: 0;
				border-bottom-right-radius: 0;
			}
			input[type="password"] {
				margin-bottom: 20px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
			}
		}
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
                <div class="wrapper">
					<form class="form-signin" method="post" action="checkuser.php">       
					  <h2 class="form-signin-heading">Please login</h2>
					  <input type="text" class="form-control" name="username" placeholder="username" required="" autofocus="" />
					  <br/>
					  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
					  <br/>
					  <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogin" value="Login">Login</button>   
					</form>
				</div>
            </div>
        </div>
        <script src="utils/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="utils/bootstrap-3.3.4-dist/js/bootstrap.min.js" type="text/javascript"></script>     
        <script src="scripts/global-script.js" type="text/javascript"></script>
    </body>
</html>
