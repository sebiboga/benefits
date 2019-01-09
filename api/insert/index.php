<?php

function GUID() {
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
$key=GUID();
require_once("db_connect.php");
$comp="COMPANIE";
$desc=$url=$title="";
if(isset($_POST["comp"])) {$comp=$_POST["comp"];}
echo $comp;
if(isset($_POST["description"])) {$desc=$_POST["description"];}
if(isset($_POST["url"])) {$url=$_POST["url"];}
if(isset($_POST["title"])) {$title=$_POST["title"];}
if(isset($_POST["end"])) {$end_date=$_POST["end"];}
if(isset($_POST["start_date"])) {$start_date=$_POST["start_date"];}
$sql="SELECT * FROM benefits WHERE company='".$comp."' AND description='".$desc."' AND url='".$url."'";
$result=$con -> query($sql);
if ($result -> num_rows==0){
echo $sql_insert= 'INSERT INTO `benefits`(`id`, `company`, `description`, `url`, `title`, `start_date`, `end_date`) VALUES ("'.$key.'","'.$comp.'","'.$desc.'","'.$url.'","'.$title.'","'.$start_date.'","'.$end_date.'")';
$result_insert=$con->query($sql_insert);

}

 
?>