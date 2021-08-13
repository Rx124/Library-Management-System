<?php
include 'dbinfo.php'; 
?>  
<?php

session_start(); 

$username = $_SESSION['username'];
?> 
<html>
<head>
	<title>Extension Request</title>
	<link rel="stylesheet" href="library.css">
</head>
<body>
<h1 id="title">Request Extension On a Book</h1>

<div class="parent">
		<div class="child-centralise">
			<div class="justForNow">
<form action="ExtensionResult.php" method="post">
<table>
<tr>
    <td>Enter your issue ID</td>
    <td><input class="input-box" type="text" name="issueid" required/></td>
</tr>
</table>

<span class="justForNow"><input class="primary-button" type="Submit" value="Submit" /></span>

</form>
            </div>
            <div class="justForNow">
<form action="UserSummary.php" method="post">
<span class="justForNow"><input class="secondary-button" type="Submit" value="Back" /></span>
</div>
</form>
</body>
</html>