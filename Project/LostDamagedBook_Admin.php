<?php
include 'dbinfo.php';
?>
<?php

session_start();

$isbn = null;
$copyid = null;
$username = $_SESSION['username'];
$currentime = date("Y-m-d H:i");
$Name = null;
$_SESSION['target'] = "AdminSummary.php";
if (isset($_POST['isbn']) and isset($_POST['copynumber'])) {
	$isbn = $_POST['isbn'];
	$copyid = $_POST['copynumber'];
	$link = mysqli_connect($host, $user, $pass) or die("Unable to connect");
	mysqli_select_db($link, $database) or die("Unable to select database");

	$sql_query = "Select Max(IssueID) AS last_issueid From issue AS I Where I.ISBN = '$isbn' AND I.CopyID = '$copyid'";

	$result = mysqli_query($link, $sql_query)  or die(mysqli_error($link));
	if ($result == false) {
		echo 'The query failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$last_issueid = $row['last_issueid'];
	mysqli_select_db($link, $database) or die("Unable to select database");

	$sql_query = "Select SF.Username, Name From issue AS I, student_faculty AS SF Where I.IssueID = '$last_issueid' AND I.Username = SF.Username";

	$result = mysqli_query($link, $sql_query)  or die(mysqli_error($link));
	if ($result == false) {
		echo 'The query failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$Name = $row['Name'];
	$chargename = $row['Username'];
	$_SESSION['chargename'] = $chargename;
}
?>
<html>
<head>
	<title>Lost/Damaged</title>
	<link rel="stylesheet" href="library.css">
</head>
<body>
	<h1 id="title">Lost Damaged Book</h1>
	<div class="parent">
		<div class="child-centralise" style="width: 100%;">
			<div class="justForNow">
				<form action="" method="post">
					<table>
						<tr>
							<td>ISBN</td>
							<td><input class="input-box" type="text" name="isbn" value="<?php echo $isbn; ?>" required /></td>
						</tr>
						<tr>
							<td>Copy Number</td>
							<td><input class="input-box" type="text" name="copynumber" value="<?php echo $copyid; ?>" required /></td>
						</tr>

						<tr>
							<td>Current Time</td>
							<td><?php echo $currentime; ?></td>
						</tr>
					</table>
					<span class="justForNow"><input type="submit" class="primary-button" style="width: 150px" value="Look for the last user" /></span>
				</form>
			</div>
			<div class="justForNow" style="padding-top: 1%;">
				<form action="ConfirmDamage.php" method="post">
					<table>
						<tr>
							<td>Last User of Book: </td>
							<td><?php echo $Name; ?></td>
						</tr>

						<tr>
							<td>Amount to be charged: </td>
							<td><input class="input-box" type="text" style="height: 100%; width: 80%" name="charge" required /></td>
						</tr>
					</table>
					<span class="justForNow"><input type="submit" class="primary-button" value="Submit" />
				</form>
			</div>
			<div class="justForNow" style="padding-top: 1%;">
				<form action="AdminSummary.php" method="post">
					<input type="submit" class="secondary-button" value="Back" />
				</form>
				</div>
		</div>
	</div>
</body>

</html>