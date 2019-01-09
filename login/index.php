<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
require_once("db_connect.php");
$user=$password="";
if(isset($_POST["user"])){ $user = $_POST["user"]; }
if(isset($_POST["pass"])){$password =md5($_POST["pass"]); }
$string='company';
if($user!="" && $password!="")
{
	$sql="SELECT * FROM `company` WHERE username='".$user."' AND password='".$password."'";
	$result=$con -> query($sql);
	if ($result -> num_rows!=0)
	{
		while ($rws= $result->fetch_assoc())
		{
			$company=$rws["name"];
		}
?>
	<form action="..\api\insert\index.php" method="post">
		<input type="hidden" name="comp" value="<?php echo $company; ?>">
		<br>
		<input type="text" name="title" placeholder="Title">
		<br>
		<textarea name="description" rows="4" cols="50"></textarea>
		<br>
		<input type="text" name="url" placeholder="url">
		<br>
		<input type="date" name="start_date" placeholder="Start date">
		<br>
		<input type="date" name="end" placeholder="End date">
		<br>
		<input type="submit" name="click" value='Add'>
	</form>


<?php
	
	}
}


?>
