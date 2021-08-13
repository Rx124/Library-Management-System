<?php
include 'dbinfo.php'; 
?>  
<?php

session_start(); 

$username = $_SESSION['username'];
$issueid = $_SESSION['issueid'];
$extendate = $_SESSION['extendate'];
$returndate = $_SESSION['returndate'];
$numexten = $_SESSION['numexten'];
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "UPDATE issue AS I SET ExtenDate = '$extendate', ReturnDate = '$returndate', NumExten = '$numexten' Where I.IssueID = '$issueid'";
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
?> 

<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="library.css">
</head>
<body>
<h1 id="title">Extension Success</h1>
<div class="parent">
<form action="UserSummary.php" method="post">
<input class="secondary-button" type="submit" value="Back" />
</div>
</form>
</body>
</html>
