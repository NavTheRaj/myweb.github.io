<?php
 $dbname="sunway";
 $dbserver="localhost";
 $dbpassword="";
 $dbusername="root";

$db = new mysqli( $dbserver,$dbusername,$dbpassword,$dbname);

if($db->connect_error){
	echo "Error connecting database";
}

?>