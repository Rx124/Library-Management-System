<?php
include 'dbinfo.php'; 
?>  
<?php

session_start(); 

$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

$sql_query = "select Month(issueDate) as month, count(copyID) as copynum, subname FROM
book as b, issue as i
where b.isbn=i.isbn and ExtenDate is not null group by month, subname";

  $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));	
if($result == false)
{
	echo 'The query by ISBN failed.';
	exit();
}
$data = array();
    foreach ($result as $row) {
	$data[] = $row;
}
echo json_encode($data);

?>
