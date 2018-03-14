<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Yamadori Maps | Home</title>
	<?php require('meta.php'); ?>
	<link rel="stylesheet" href="css/style.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Home</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php include('loginForm.php'); ?>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="col-md-1">
		</div>
		<div class="col-md-5 panel panel-default">
			<?php include('registerForm.php'); ?>
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-4 panel panel-default" style="padding-bottom:16px;">
			<?php include('emailForm.php'); ?>
		</div>
		<div class="col-md-1">
		</div>
		<div class="footer navbar-fixed-bottom navbar-default">
			<?php include('copyright.php'); ?>
		</div>
	</div>
</body>

</html>
