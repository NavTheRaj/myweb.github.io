<?php include("dbconnect.php");?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Show</title>
	
</head>
<body>
<div class="header">
<center><h3>Admin priviledges</h3></center>	
</div>

<center>
<table border="1px solid black" style="border-collapse:collapse;height:auto; width:100%; ">
	<thead style="background-color:grey; color: white; text-align:center; ">
		<th>ID</th>
		<th>NAME</th>
		<th>EMAIL</th>
		<th>Password</th>
		<th>Action</th>
		 
	</thead>
	<?php
	$sql="SELECT * FROM reg_user";
	 
	$query=mysqli_query($db,$sql);
	 
	if(mysqli_num_rows($query)>0){
		while($rows=mysqli_fetch_assoc($query))
		{
		$id = $rows['id'];
		echo "<tr style='text-align:center;'>";
	    echo"<td>".$rows['id']."</td>";
	    echo"<td>".$rows['name']."</td>";
	    echo"<td>".$rows['email']."</td>";
	    echo"<td>".$rows['password']."</td>";
	    echo "<td><a href='edit.php?id=$id'><img src='img/update.png'></a>&nbsp;&nbsp;<a href='delete.php?id=$id'><img src='img/delete.png'></a>&nbsp;&nbsp;<a href='read.php?id=$id'><img src='img/read.png'></a></td>";
	     }
	}
	 
	
	echo "</tr>";
     ?>
</table>
</center>
</body>
</html>