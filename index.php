<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Форма комментариев</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="czr-favicon" rel="shortcut icon" href="favicon.png" type="image/png">
	
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>

<?php
	include('assets/includes/nav.php');
?>

<div class="container">
	<div class="row">

		<div class="col-md-8" role="main">
			<div class="panel panel-default">
				<div class="panel-body" id="indexInfo">
					<h3 class="control-title">Форма с комментариями</h3>
					<h4>Task 1:</h4>
					<p>Task by Codevery</p>
					<a class="btn btn-link btn-lg btn-block" href="task.php">Task</a>
					<a class="btn btn-primary btn-lg btn-block" href="form.php">Form</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	include('assets/includes/footer.php');
?>

</body>
</html>