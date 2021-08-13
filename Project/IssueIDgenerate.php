<?php
include 'dbinfo.php';
?>
<?php

session_start();

$isbn = $_POST['ISBN'];
$_SESSION['isbn'] = $isbn;
$username = $_SESSION['username'];
$today = date("Y-m-d");
$plus = strtotime("+14 day", time());
$estimate = date('Y-m-d', $plus);
$link = mysqli_connect($host, $user, $pass) or die("Unable to connect");
mysqli_select_db($link, $database) or die("Unable to select database");

$sql_query = "Select Max(IssueID) AS issueid From issue";

$result = mysqli_query($link, $sql_query)  or die(mysqli_error($link));
if ($result == false) {
	echo 'The query by ISBN failed.';
	exit();
}
$row = mysqli_fetch_array($result);
$issueid = $row['issueid'];
$newisssueid = $issueid + 1;

$mincopyidstatement = "Select Min(CopyId) AS copyid From bookCopy AS BC Where BC.ISBN = '$isbn' AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";

$result = mysqli_query($link, $mincopyidstatement)  or die(mysqli_error($link));
if ($result == false) {
	echo 'The query by ISBN failed.';
	exit();
}
$row = mysqli_fetch_array($result);
$copyid = $row['copyid'];

$insertissue = "INSERT INTO issue (Username, ISBN, CopyID, IssueID, ExtenDate, IssueDate,
	ReturnDate, NumExten) VALUES ('$username', '$isbn', '$copyid', '$newisssueid', null, '$today', '$estimate', 0)";

$result = mysqli_query($link, $insertissue)  or die(mysqli_error($link));
if ($result == false) {
	echo 'The query by ISBN failed.';
	exit();
}

$insertissue = "UPDATE bookcopy AS BC SET IsHold = 1 Where BC.ISBN = '$isbn' AND BC.CopyID = '$copyid'";

$result = mysqli_query($link, $insertissue)  or die(mysqli_error($link));
if ($result == false) {
	echo 'The query by ISBN failed.';
	exit();
}
?>
<html>

<head>
	<link rel="stylesheet" href="library.css">
</head>

<body>
	<div class="parent">
		<div class="child-centralised">
			<div class="justForNow">
				<table>
					<tr style="color: #ffffff">
						<td>YOUR Issue ID</td>
						<td><?php echo $newisssueid; ?></td>
					</tr>
				</table>
			</div>
			<div class="justForNow">
				<form action="UserSummary.php" method="post" class="justForNow">
					<input type="submit" class="secondary-button" value="Back" />
				</form>
				<br>
				<form action="Login.php" method="post" class="justForNow">
					<input type="submit" class="secondary-button" value="Close" />
				</form>
			</div>
		</div>
	</div>
</body>

</html>