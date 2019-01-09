<?php 
$comp='';
if (isset($_GET['company'])) {$comp=$_GET['company'];}

$results=array();
$sql = 'SELECT j.*,c.logo FROM `jobs` j LEFT JOIN company c ON c.name = j.company WHERE company="'.$comp.'" ';
require_once('../../DB/db_connect.php');
 $result = $con -> query($sql);
  if ($result -> num_rows==0) {
 }
   else {
	   while ($row = mysqli_fetch_array( $result )) {
				$output = new StdClass();
				 $output ->  id 			= $row['id'];
				 $output ->  company 		= $row['company'];
				 $output ->  title 		    = $row['title'];
				 $output ->  description 	= $row['description']; 
				 $output ->  url 			= $row['url'];
				 $output ->  logo 			= $row['logo'];
				 
				 $results[]=$output;
			}
	   } 
 

 
 print_r(json_encode($results));
?>
