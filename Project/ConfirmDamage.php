<?php
include 'dbinfo.php';
?>
<?php

session_start();

$username = $_SESSION['username'];
$chargename = $_SESSION['chargename'];
$target = $_SESSION['target'];
$this_penalty = $_POST['charge'];
$link = mysqli_connect($host, $user, $pass) or die("Unable to connect");
mysqli_select_db($link, $database) or die("Unable to select database");

$sql_query = "Select SF.Penalty AS old_penalty From student_faculty AS SF Where SF.Username = '$chargename'";

$result = mysqli_query($link, $sql_query)  or die(mysqli_error($link));
if ($result == false) {
	echo 'The query failed.';
	exit();
}
$row = mysqli_fetch_array($result);
$old_penalty = $row['old_penalty'];
$new_penalty = $this_penalty + $old_penalty;

$sql_query = "UPDATE student_faculty AS SF SET Penalty = '$new_penalty' Where SF.Username = '$chargename'";

$result = mysqli_query($link, $sql_query)  or die(mysqli_error($link));
if ($result == false) {
	echo 'The query failed.';
	exit();
}
if ($new_penalty >= 100) {

	$sql_query = "UPDATE student_faculty AS SF SET IsDebarred = 1 Where SF.Username = '$chargename'";

	$result = mysqli_query($link, $sql_query)  or die(mysqli_error($link));
	if ($result == false) {
		echo 'The query failed.';
		exit();
	}
}
?>
<html>

<head>
	<title>Charge</title>
	<link rel="stylesheet" href="library.css">
</head>

<body>
	<h1 id="title">Charge Success</h1>
	<div class="justForNow">
		<form action="<?php echo $target; ?>" method="post">
			<input type="submit" class="secondary-button" value="Back" />
		</form>
	</div>
</body>

</html>