<?php include('engine.php')?>
<?php
if(!isset($_SESSION['name'])){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Home</title>
</head>
<body>
<div class="header">
<center><h3>Welcome to the website!!</h3></center>	
</div>

<div>
 <p>Welcome <?php echo html_entity_decode($_SESSION['name']);  ?>: <span><a href="index.php?logout='1'">LogOut</a></span></p>
<div>

 
	<button type="submit" name="show_data" class="btn"><a href="show.php" style="text-decoration-line: none;color:white;">Show Database</a></button>
 


</body>
</html>
