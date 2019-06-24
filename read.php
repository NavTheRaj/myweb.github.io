<?php
include "engine.php";
include "dbconnect.php";

$id=$_GET['id'];
$sql="SELECT * FROM reg_user WHERE id='$id'";
$query=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Read</title>
</head>
<body>
<div class="header">
<center><h3><?php 
echo "Account Info For : ",$row['name'];

?></h3></center>	
</div>

<div class="container">
	<form action="engine.php" method="POST">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="name" value="<?php echo $row['name'];?>" readonly>
		</div>

		<div class="input-group">
			<label>E-mail</label>
			<input type="email" name="email" value="<?php echo $row['email'];?>" readonly>
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="text" name="password_1" value="<?php echo $row['password'];?>" readonly>
		</div>

		<!-- <div class="input-group">
			<label>Confirm password</label>
			<input type="text" name="password_2" readonly>
		</div>
		 -->
		<!-- <div class="input-group">
			<button type="submit" name="update_user" class="btn" value="Update">Update</button>
		</div> -->

		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
	</form>
	<?php handle_errors(); ?>
	 
</div>


</body>
</html>
