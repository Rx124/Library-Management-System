<?php
include 'dbinfo.php';
?>
<?php

session_start();

$ori_month = null;
$firstsubject = null;
$secondsubject = null;
$thirdsubject = null;
$firstisdamagednum = null;
$secondisdamagednum = null;
$thirdisdamagednum = null;
$link = mysqli_connect($host, $user, $pass) or die("Unable to connect");
mysqli_select_db($link, $database) or die("Unable to select database");
if (isset($_POST['month']) and isset($_POST['firstsubject']) and isset($_POST['secondsubject']) and isset($_POST['thirdsubject'])) {
	$ori_month = $_POST['month'];
	$month = date('m', strtotime($ori_month));
	$firstsubject = $_POST['firstsubject'];
	$secondsubject = $_POST['secondsubject'];
	$thirdsubject = $_POST['thirdsubject'];

	$sql_query1 = "Select Count(IsDamaged) AS damagednum From book AS B, bookcopy AS BC, issue AS I
		Where B.ISBN = I.ISBN AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID AND Month(IssueDate) = '$month' AND SubName = '$firstsubject' Order by damagednum DESC LIMIT 3";

	$result1 = mysqli_query($link, $sql_query1)  or die(mysqli_error($link));
	if ($result1 == false) {
		echo 'The query by ISBN failed.';
		exit();
	}

	$sql_query2 = "Select Count(IsDamaged) AS damagednum From book AS B, bookcopy AS BC, issue AS I
		Where B.ISBN = I.ISBN AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID AND Month(IssueDate) = '$month' AND SubName = '$secondsubject' Order by damagednum DESC LIMIT 3";

	$result2 = mysqli_query($link, $sql_query2)  or die(mysqli_error($link));
	if ($result2 == false) {
		echo 'The query by ISBN failed.';
		exit();
	}

	$sql_query3 = "Select Count(IsDamaged) AS damagednum From book AS B, bookcopy AS BC, issue AS I
		Where B.ISBN = I.ISBN AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID AND Month(IssueDate) = '$month' AND SubName = '$thirdsubject' Order by damagednum DESC LIMIT 3";

	$result3 = mysqli_query($link, $sql_query3)  or die(mysqli_error($link));
	if ($result3 == false) {
		echo 'The query by ISBN failed.';
		exit();
	}
	$row1 = mysqli_fetch_array($result1);
	$firstisdamagednum = $row1['damagednum'];
	$row2 = mysqli_fetch_array($result2);
	$secondisdamagednum = $row2['damagednum'];
	$row3 = mysqli_fetch_array($result3);
	$thirdisdamagednum = $row3['damagednum'];
}

?>




<html>

<head>
	<title>Damaged Books</title>
	<link rel="stylesheet" href="library.css">
</head>

<body>
	<h1 id="title">Damaged Book Report</h1>
	<div class="parent">
		<div class="child-centralise" style="width: 100%;">
			<div class="justForNow">
				<form action="" method="post">
					<table>
						<tr>
							<td>Month</td>
							<td>
								<select name="month" required>
									<option selected disabled hidden value=''></option>
									<option value="January">January</option>
									<option value="February">February</option>
									<option value="March">March</option>
									<option value="April">April</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="August">August</option>
									<option value="September">September</option>
									<option value="October">October</option>
									<option value="November">November</option>
									<option value="December">December</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Subject</td>
							<td>
								<select name="firstsubject" required>
									<option selected disabled hidden value=''></option>
									<option value="Computer Architecture">Computer Architecture</option>
									<option value="Psychology">Psychology</option>
									<option value="Physics">Physics</option>
									<option value="Calculus">Calculus</option>
									<option value="Data Science">Data Science</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Subject</td>
							<td>
								<select name="secondsubject" required>
									<option selected disabled hidden value=''></option>
									<option value="Computer Architecture">Computer Architecture</option>
									<option value="Psychology">Psychology</option>
									<option value="Physics">Physics</option>
									<option value="Calculus">Calculus</option>
									<option value="Data Science">Data Science</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Subject</td>
							<td>
								<select name="thirdsubject" required>
									<option selected disabled hidden value=''></option>
									<option value="Computer Architecture">Computer Architecture</option>
									<option value="Psychology">Psychology</option>
									<option value="Physics">Physics</option>
									<option value="Calculus">Calculus</option>
									<option value="Data Science">Data Science</option>
								</select>
							</td>
						</tr>
					</table>
					<table border="1" style="width:100%">
						<tr>
							<th>Month</th>
							<th>Subject</th>
							<th>#damaged books</th>
						</tr>
						<tr>
							<td><?php echo $ori_month; ?></td>
							<td><?php echo $firstsubject; ?></td>
							<td><?php echo $firstisdamagednum; ?></td>
						</tr>
						<tr>
							<td><?php echo $ori_month; ?></td>
							<td><?php echo $secondsubject; ?></td>
							<td><?php echo $secondisdamagednum; ?></td>
						</tr>
						<tr>
							<td><?php echo $ori_month; ?></td>
							<td><?php echo $thirdsubject; ?></td>
							<td><?php echo $thirdisdamagednum; ?></td>
						</tr>
					</table>
					<span class="justForNow"><input type="submit" class="primary-button" value="Show Report" style="width: 100px;" onclick="showNow();" />
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