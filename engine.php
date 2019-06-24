 <?php include('dbconnect.php');
require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';
require '/usr/share/php/libphp-phpmailer/PHPMailerAutoload.php';


?>
<?php 

session_start();
$id="";
$name="";
$email="";
 
$errors = array();

 

if(isset($_POST['reg_user'])){
	user_registration();
}

if(isset($_POST['login_user'])){
	user_login();
}

if(isset($_POST['update_user'])){
	user_update();
}

if(isset($_POST['delete_user'])){
	user_delete();
}

if(isset($_POST['show_data'])){

	header('location:show.php');
}

if(isset($_GET['logout'])){
	unset($_SESSION['name']);
	session_destroy();
	header('location:login.php');
}

function user_login(){
	 
	global $name,$email,$errors,$db;
	$name = validate($_POST['name']);
	$password= validate($_POST['password']);
	 

	if(empty($name)){
		array_push($errors, "username cannot be empty");
	}
	if(empty($password)){
		array_push($errors, "password cannot be empty");
	}
	
	if(count($errors)==0){
		$password = md5($password);
		
		$sql = "SELECT * FROM  reg_user WHERE name='$name' AND  password='$password' LIMIT 1";
		 
		$result = $db->query($sql);
		
		$data=$result->fetch_assoc();
		
		$_SESSION['name'] = $data['name'];
		
		//header('location:index.php');

		if($db->query($sql)===TRUE){
			 
			header('location:index.php');
		                           
		}
	}

	}

	function user_update(){

	global $name,$email,$errors,$db;
	$id=$_POST['id'];
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$password_1 = validate($_POST['password_1']);
	$password_2 = validate($_POST['password_2']);

	if(empty($name)){
		array_push($errors, "username cannot be empty");
	}
	if(empty($email)){
		array_push($errors, "email cannot be empty");
	}
	if(empty($password_1)){
		array_push($errors, "password cannot be empty");
	}
	if($password_1 != $password_2){
		array_push($errors, "password do not match");
	}

	if(count($errors)==0){
		$password = md5($password_1);
		$sql = "UPDATE `reg_user` SET `name` = '$name', `email` = '$email', `password` = '$password' WHERE `id` = '$id'";
		echo $sql;
		if($db->query($sql)===TRUE){
			header("location:show.php");
		}
	}


	}

function user_registration(){
	global $name,$email,$errors,$db,$vkey;
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$password_1 = validate($_POST['password_1']);
	$password_2 = validate($_POST['password_2']);
	$vkey=md5(time().$name);

	if(empty($name)){
		array_push($errors, "username cannot be empty");
	}
	if(empty($email)){
		array_push($errors, "email cannot be empty");
	}
	if(empty($password_1)){
		array_push($errors, "password cannot be empty");
	}
	if($password_1 != $password_2){
		array_push($errors, "password do not match");
	}

	if(count($errors)==0){
		$password = md5($password_1);
		$sql = "INSERT INTO `reg_user` (`name`, `email`, `password`,`vkey`) VALUES ('$name', '$email', '$password','$vkey')";
		//echo $sql;
		if($db->query($sql)===TRUE){

$mail = new PHPMailer;
$mail->setFrom('admin@example.com');
$mail->addAddress($email);
$mail->Subject = 'Account Registration';
$mail->headers = "MIME-Version: 1.0" . "\r\n";
$mail->headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
$link='<a href="http://localhost/sunway/verify.php?vkey='.$vkey.'">Confirm Your Account</a>';
$mail->Body = '<h2 style="color:red">Hello '.$name.' Click on the link for registration!</h2><a href="http://localhost/sunway/verify.php?vkey='.$vkey.'">Confirm Your Account</a>';
$mail->isHtml(true);
$mail->AltBody =$link;
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = 'ssl://smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 465;// Always set content-type when sending HTML email


//Set your existing gmail address as user name
$mail->Username ='replynot1234@gmail.com';

//Set the password of your gmail address here
$mail->Password = 'Noreply@1234';
if(!$mail->send()) {
  echo 'Email is not sent.';
  echo 'Email error: ' . $mail->ErrorInfo;
} 

else {
  echo 'Email has been sent.<br>Please check Your email';
}

		//header('location:login.php');

		}
	}

	
}



function user_delete(){

global $db;
$id=$_POST['id'];
$sql="DELETE FROM `reg_user` WHERE id ='$id'";
echo $sql;
if($db->query($sql)==TRUE){

	header("location:show.php");
}

else{
	die("Error occured");
}


}

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function handle_errors(){
	global $errors;
	if(count($errors)>0){
		echo "<p style='color:red'>Correct the following errors:</p>";

		
		echo "<ul>";
		foreach ($errors as $error) {
			echo "<li style='color:red'>$error</li>";
		}
		echo "</ul>";

	}
}




 ?>
