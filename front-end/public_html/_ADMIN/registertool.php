<?php
	// Start a php session
	include('../_CONNECT/server-connect.php');
	
	// Start a php session
	session_name("employee");
	session_start("employee");
		
	//Check to see if user is not logged in
	if(!isset($_SESSION['employee']))
	{
		header("Location: ../login.php");
		exit;
	}
?>


<!DOCTYPE html>

<!--
ToolTime
registertool.php (TOOL)
CIS 440
Spring 2015
-->

<html>
	<head>
		<!--TITLE-->
			<title>ToolTime: Add Tool</title>
		
		<!--REQ FOR RESPONSIVE BOOTSTRAP-->
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!--CDN JQUERY LINKS-->
			<!--JS 1.11.2-->	<script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
			<!--JS 2.1.3-->		<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
		<!--CDN JQUERY MOBILE LINKS-->
			<!--JS 1.4.5		<script src = "http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>-->
			<!--CSS 1.4.5		<script src = "http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.css"></script>-->
				<!--1.4.5 not hosted by Google. Also causes style issues w/Navbar.-->
				
		<!--CDN JQUERY UI LINKS-->
			<!--CSS 1.11.3-->	<link 	rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
			<!--JS 1.11.3-->	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
		
		<!--LOCAL CSS LINKS-->
			<!--BOOTSTRAP-->	<link 	href = "../css/bootstrap.min.css" rel = "stylesheet">
			<!--OVERWRITE-->	<link 	href = "../css/style.css" rel = "stylesheet">
		
		<!--LOCAL SCRIPT LINKS-->
			<!--BOOTSTRAP-->	<script src = "../js/bootstrap.js"></script>
			<!--NAVBAR-->		<script src = "../js/navbar.js"></script>
			<!--JQUERY-->		<script src = "../js/jquery-2.1.3.js"></script>
		
		<!--LOCAL CAKEPHP LINKS-->
			<!---->
		
		<!--LOCAL FAVICON LINK-->
			<link rel="icon" href="../images/favicon.ico" />			
	</head>
	
	<body>
		<!--FULL WRAPPER-->
		<div id="wrapper">
			<div class="overlay"></div>
			<!--PAGE CONTENT WRAPPER-->
			<div id="page-content-wrapper">
				<nav class="navbar navbar-default navbar-fixed-top navbarcolor">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="../index.php">
						  <img src = "../images/longlogo.png" id="headerimg" alt = "Logo">
						  </a>  
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav">
							<li class="fix"><a href="../toolcheckin.php">Tool Check-In <span class="sr-only">(current)</span></a></li>
							<!--<li><a href="#">Link</a></li>-->
							<?
								if($_SESSION['title'] == "Admin")
								{
									echo '<li class="dropdown">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin Panel <span class="caret"></span></a>
									  <ul class="dropdown-menu" role="menu">
										<li><a href="registertool.php">Add Tools</a></li>
										<li><a href="removetool.php">Remove Tools</a></li>
										<li><a href="editselect.php">Edit a Tool</a></li>
										<li class="divider"></li>
										<li><a href="#">Reporting</a></li>
										<li class="divider"></li>
										<li><a href="register.php">Add A User</a></li>
									  </ul>
									</li>';
								}
							?>
						  </ul>
						  <form class="navbar-form navbar-left" role="search">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default btn-color">Go</button>
						  </form>
						  <ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["employee"]; ?> <span class="caret"></span></a>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="#">Account Info</a></li>
								<li><a href="#">Rental History</a></li>
								<li class="divider"></li>
								<li><a href="../logout.php">Sign Out</a></li>
							  </ul>
							</li>
						  </ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				
				<div class="container">
					<div class="col-lg-8 col-lg-offset-2">
						<ol class="breadcrumb breadcrumb-color">
							<li><a href="../index.php">Home</a></li>
							<li class="active">Admin: Add Tool</li>
						</ol>
						
						<div class="jumbotron jumbotron-register center-block">
							<form action="addtool.php" method="post">
								<h3 class="dark-grey">Tool Registration</h3>
												
								<div class="form-group col-lg-6">
									<label>BERCO ID#</label>
									<input type="text" name="bercoid" class="form-control" id="bercoid" value="" required autofocus>
								</div>
								
								<div class="form-group col-lg-6">
									<label for ="category">Category</label>
									<select name="category" class="form-control" value="" id="category" required>
										<option value="">Select...</option>
										<option value="powertool">Power Tool</option>
										<option value="handtool">Hand Tool</option>
										<option value="office">Office</option>
										<option value="lift">Lift</option>
										<option value="safety">Safety</option>
										<option value="traffic">Traffic</option>
										<option value="cleaning">Cleaning</option>
										<option value="Other">Other</option>
									</select>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Name</label>
									<input type="text" name="name" class="form-control" id="name" value="" required>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Daily Price</label>
									<input type="text" name="dailyprice" class="form-control" id="dailyprice" value="" required>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Weekly Price</label>
									<input type="text" name="weeklyprice" class="form-control" id="weeklyprice" value="" required>
								</div>		
								
								<div class="form-group col-lg-6">
									<label>Monthly Price</label>
									<input type="text" name="monthlyprice" class="form-control" id="monthlyprice" value="" required>
								</div>
								
								<div class="form-group col-lg-6">
									<label>Tool Value</label>
									<input type="text" name="toolvalue" class="form-control" id="toolvalue" value="" required>
								</div>	
								
								<div class="form-group col-lg-6">
									<label for ="location">Location</label>
									<select name="location" class="form-control" value="" id="location" required>
										<option value="">Select...</option>
										<option value="Phoenix">Phoenix</option>
										<option value="Seattle">Seattle</option>
										<option value="LA">LA</option>
									</select>
								</div>			
								
								<div class="form-group">
									<button type="submit" class="btn btn-primary center-block">Register</button>		
								</div>	
							</form>
						</div>
						
						<div class="container">
							<p class="col-lg-8 text-center">Bayley Construction &copy; 2015</p>
						</div>
					</div>
				</div>
			</div>
			<!--/PAGE CONTENT WRAPPER-->
		</div>
		<!--/FULL WRAPPER-->	
	</body>
</html>