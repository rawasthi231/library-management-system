<!DOCTYPE html>
<html>
<head>
	<title>eLMS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="img/favicon.ico" rel="icon" type="image/x-icon" />
    <style>
    	body{
    		background-color: #efefef;
    	}
    	.header{
    		margin-top: 5px;
    		height: 80px;
    		background-color: #10002f;
    		border-radius: 50px;
    	}
    	.header .floatleft{
    		float: left;
    		margin-left: 20px;
    	}
    	.header .floatright{
    		float: right;
    		margin-right: : 20px;
    	}
    	.header .floatleft ul{
    		display:inline-table;
    	}
    	.form-control{
    		width: 400px;
    	}
    	input{
    		width: 150px;
    	}

    </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row header">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="floatleft">
                    <h2 style="color: #efefef;">eLMS | Library Management System</h2>
                </div>
            </div>
		</div>
	</div>
	<div class="container">
		<div class="row"> 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"><br>
				<h3 class="text-primary text-center">Login here to go admin dashboard</h3> <br>
				<form method="POST">
					<div class="form-group">
						<label>User Id</label>
						<input type="text" name="uId" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="uPass" class="form-control">
					</div>
					<input type="submit" name="btnLogin" value="Login" class="btn btn-outline-primary">
				</form>
				<br>
				<a href="Admin_Signup.php" title="Create new admin account">Don't have account?</a>
			<br> <br>

<?php
	include("connection.php");
	session_start();
	error_reporting(0);
	if (isset($_POST['btnLogin'])) {
		$userId = $_POST['uId'];
		$pass = md5($_POST['uPass']);
		$run = mysqli_query($con, "select * from admin where User_Id = '$userId' and Password = '$pass'");
		$row = mysqli_num_rows($run);
		if ($row >= 1) {
			$_SESSION['usrId'] = $userId;
			echo "<script>alert('Logged in successfully');
				window.location.href='dashboard.php'</script>";
		} else {
			echo '	<div class="alert alert-dark alert-dismissible fade show" role="alert">
  						<P class="text-center text-danger">Login failed, Please provide correct credentials...</P>
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
  						</button>
					</div>';
			//echo "<script>alert('Login failed');
			//	window.location.href='index.php'</script>";
		}
	}
?>
		</div>
	</div>
	<hr> <br> 
	<p class="text-success text-center"> Designed & Developed at AkshTech Solutions Pvt. Ltd. @ Copyright 2020</p>

				

	</div>
	<br>

 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>