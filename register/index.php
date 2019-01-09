<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>

</head>
<body>
<?php

if(isset($_POST['click']))
{
	
function GUID() {
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

$key=GUID();
$comp=$logo="";
if(isset($_POST["comp"])) {$comp=$_POST["comp"];}
if(isset($_POST["logo"])) {$logo=$_POST["logo"];}
if(isset($_POST["name"])) {$name_pers=$_POST["name"];}
if(isset($_POST["mail"])) {$mail=$_POST["mail"];}
if(isset($_POST["phone"])) {$phone=$_POST["phone"];}
if(isset($_POST["user"])) {$user=$_POST["user"];}
if(isset($_POST["password"])) {$pass=md5($_POST["password"]);}
require_once("db_connect.php");
$sql="SELECT * FROM `company` WHERE name='".$comp."'";
$result=$con -> query($sql);
if ($result -> num_rows==0){
	$sql2="SELECT * FROM `company` WHERE name='".$comp."' AND logo='".$logo."' AND name_pers='".$name_pers."' AND mail='".$mail."' AND phone='".$phone."'  AND username='".$user."'  AND password='".($pass)."'";
	$result2=$con -> query($sql2);
	if($result2 -> num_rows==0){
	$sql_insert= "INSERT INTO `company` (id,name,logo,name_pers,mail,phone,username,password ) VALUES ('".$key."','".$comp."','".$logo."','".$name_pers."','".$mail."','".$phone."','".$user."','".($pass)."')";
	$result_insert=$con->query($sql_insert);
	echo 'you are registered. Please <a href="../login/">Login</a>';}
	
}
}
  else 
  {
?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="text" name="comp" placeholder="Company's name">
		<br>
		<input type="text" name="name" placeholder="Your name">
		<br>
		<input type="text" name="mail" placeholder="Mail">
		<br>
		<input type="text" name="phone" placeholder="Phone number">
		<br>
		<input type="text" name="logo" placeholder="Logo">
		<br>
		<input type="text" name="user" placeholder="username">
		<br>
		<input type="password" name="password" placeholder="password">
		<br>
		
		<input type="submit" name="click" value='Add'>
	</form>
	
	
	<?php
  }
  ?>
	
</body>
</html>
