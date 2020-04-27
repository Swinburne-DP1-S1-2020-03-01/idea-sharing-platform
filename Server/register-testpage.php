<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Topic page"/>
	<meta name="keywords" content="html, tags"/>
	<meta name="author" content="Chuong"/>
	
	<!-- <link href="styles/style.css" rel="stylesheet"/> -->
  	<meta name="viewport" content="width=device-width, initial-scale=1"/>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>
  	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> -->
	<title>Test login/register</title>
</head>
<body>
    <h1>Register</h1>
	<form method="post" action="process-register.php"  class="form-group">
		<fieldset>
				<p><label for="username" >Username</label> <input type="text" id="username" name="username" class="form-control"/></p>
				<p><label for="pwd1">Password</label> <input type="password" id="pwd1" name="pwd1" class="form-control"/></p>
				<p><label for="pwd2">Confirm password</label><input type="password" id="pwd2" name="pwd2" class="form-control"/></p>
			<p><input type="submit" class="btn btn-default btn-primary" name="register" value="Register"/></p>
		</fieldset>
	</form>
</body>
</html>