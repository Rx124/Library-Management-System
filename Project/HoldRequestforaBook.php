<?php
include 'dbinfo.php';
?>
<?php

session_start();


$link = mysqli_connect($host, $user, $pass) or die("Unable to connect");
mysqli_select_db($link, $database) or die("Unable to select database");
$username = $_SESSION['username'];

if ($_POST['isbn'] != null) {
	$isbn = $_POST['isbn'];

	$sql_query1 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";

	$result1 = mysqli_query($link, $sql_query1)  or die(mysqli_error($link));
	if ($result1 == false) {
		echo 'The query by ISBN failed.';
		exit();
	}
	$sql_query_copy = "Select COUNT(CopyId) AS copyavail From book AS B, bookcopy AS BC Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";
	$result_copy = mysqli_query($link, $sql_query_copy)  or die(mysqli_error($link));
	$row = mysqli_fetch_array($result_copy);
	$copyavail = $row['copyavail'];
	if ($copyavail == 0) {
		echo 'There are no available copies right now, please go back and make a future hold request.';
	}

	$sql_query2 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where B.ISBN = '$isbn' AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0";

	$result2 = mysqli_query($link, $sql_query2)  or die(mysqli_error($link));
	if ($result2 == false) {
		echo 'The query by ISBN failed.';
		exit();
	}
} elseif ($_POST['title'] != null) {
	$title = $_POST['title'];

	$_SESSION['title'] = $title;

	$sql_query1 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where Title = '$title' AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 Group by B.ISBN";

	$result1 = mysqli_query($link, $sql_query1)  or die(mysqli_error($link));
	if ($result1 == false) {
		echo 'The query by Title failed.';
		exit();
	}
	$sql_query2 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC Where Title = '$title' AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 Group by B.ISBN";

	$result2 = mysqli_query($link, $sql_query2)  or die(mysqli_error($link));
	if ($result2 == false) {
		echo 'The query by ISBN failed.';
		exit();
	}
} elseif ($_POST['author'] != null) {
	$author = $_POST['author'];

	$_SESSION['author'] = $author;

	$sql_query1 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC, author AS A Where A.Author = '$author' AND A.ISBN = B.ISBN AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 Group by B.ISBN";

	$result1 = mysqli_query($link, $sql_query1)  or die(mysqli_error($link));
	if ($result1 == false) {
		echo 'The query by Author failed.';
		exit();
	}

	$sql_query2 = "Select B.ISBN, Title, Edition, COUNT(CopyId) AS copynum From book AS B, bookcopy AS BC, author AS A Where A.Author = '$author' AND A.ISBN = B.ISBN AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 Group by B.ISBN";

	$result2 = mysqli_query($link, $sql_query2)  or die(mysqli_error($link));
	if ($result1 == false) {
		echo 'The query by Author failed.';
		exit();
	}
} else {
	header('Location: UserSummary.php');
}
$numrow = mysqli_num_rows($result1);
if ($numrow == 0) {
	echo 'There are no available copies right now, please go back and make a future hold request.';
}
?>
<html>

<head>
	<title>Search Results</title>
	<link rel="stylesheet" href="library.css">
</head>

<body>
	<div id="title">
		<h1>Hold Request for a Book</h1>
	</div>
	<div class="parent">
		<div class="child-centralise">
			<div class="justForNow">
				<form action="IssueIDgenerate.php" method="post">
					<table border="1" style="width:100%">
						<tr>
							<th>Select</th>
							<th>ISBN</th>
							<th>Title of the book</th>
							<th>Edition</th>
							<th># copies available</th>
						</tr>
						<?php while ($row = mysqli_fetch_array($result1)) {

							$ISBN = $row['ISBN'];
							$Title = $row['Title'];
							$Edition = $row['Edition'];
							$copynum = $row['copynum'];
						?>
							<tr>
								<td><input type="radio" name="ISBN" value="<?php echo $ISBN; ?>" required></td>
								<td><?php echo $ISBN; ?></td>
								<td><?php echo $Title; ?></td>
								<td><?php echo $Edition; ?></td>
								<td><?php echo $copynum; ?></td>
							</tr>
						<?php
						}
						?>
					</table>
					<span class="justForNow"><input type="submit" style="width: 100px" class="primary-button" value="Submit" /></span>
				</form>
			</div>
			<div class="justForNow" style="padding-top: 0;">
				<h2>Books on Reserve</h2>
			</div>
			<div class="justForNow" style="padding-top: 1%;">
				<form action="" method="">
					<table border="1" style="width:100%">
						<tr>
							<th>ISBN</th>
							<th>Title of the book</th>
							<th>Edition</th>
							<th># copies available</th>
						</tr>
						<?php while ($row = mysqli_fetch_array($result2)) {

							$ISBN = $row['ISBN'];
							$Title = $row['Title'];
							$Edition = $row['Edition'];
							$copynum = $row['copynum'];

						?>
							<tr>
								<td><?php echo $ISBN; ?></td>
								<td><?php echo $Title; ?></td>
								<td><?php echo $Edition; ?></td>
								<td><?php echo $copynum; ?></td>
							</tr>
						<?php
						}
						?>
					</table>
				</form>
			</div>
			<div class="justForNow" style="padding-top: 1%;">
				<form action="SearchBooks.php" method="post">
					<span class="justForNow"><input type="submit" style="width: 100px " class="secondary-button" value="Back" /></span>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>

</html>