<?php

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
require_once("../../db/db_connect.php");
$sql="SELECT * FROM `company` WHERE name='".$comp."'";
$result=$con -> query($sql);
if ($result -> num_rows==0){
	$sql_insert= "INSERT INTO company (id,name,logo) VALUES ('".$key."','".$comp."','".$logo."')";
	$result_insert=$con->query($sql_insert);
}

 
?>