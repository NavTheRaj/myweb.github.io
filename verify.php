<?php include('engine.php');?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Verification</title>
</head>
<body>
<div class="header">
<center><h3>Verify Your Account</h3></center>	
</div>

<h3>Please Wait while we verify your account</h3>

<?php
if(isset($_GET['vkey'])){

	$vkey=$_GET['vkey'];

	$sql1="SELECT verified,vkey FROM reg_user where vkey='$vkey' AND verified=0 LIMIT 1";

	$query=mysqli_query($db,$sql1);

	if($query->num_rows==1){

		$sql2="UPDATE reg_user SET verified=1 WHERE vkey='$vkey'";
		$query2=mysqli_query($db,$sql2);

		if($query2){

			header('location:login.php');
		}

	}
	else{


		echo "Your account is invalid or already in use";


	}

}

else{

	die("Error");
}



?>

 


</body>
</html>
