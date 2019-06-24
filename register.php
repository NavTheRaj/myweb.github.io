<?php include('engine.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Registration</title>
</head>
<body>
<div class="header">
<center><h3>Registration </h3></center>	
</div>

<div class="container">
	<form action="register.php" method="POST">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="name" value="new">
		</div>

		<div class="input-group">
			<label>E-mail</label>
			<input type="email" name="email" value="navrajkhanal61@gmail.com">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" value="new">
		</div>

		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" value="new">
		</div>
		
		<div class="input-group">
			<button type="submit" name="reg_user" class="btn">Register</button>
		</div>
	</form>
	<?php handle_errors(); ?>
	<p style="color:black;">Already a Member?<a style="color:red;" href="login.php">Log In</a></p>
</div>


</body>
</html>
