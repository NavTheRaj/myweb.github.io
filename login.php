<?php include('engine.php');?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
</head>
<body>
<small style="color: green;">Registration successful</small>
<div class="header">
<center><h3>Login</h3></center>	
</div>

<div class="container">
	<form action="login.php" method="POST">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="name">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>

		
		<div class="input-group">
			<button type="submit" name="login_user" class="btn">Login</button>
		</div>
	</form>
	<?php handle_errors();?>
	<p style="color:black;">Not a Member?<a style="color:red;" href="register.php">Register Now</a></p>
</div>

</body>
</html>
