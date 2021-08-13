<?php
include 'dbinfo.php'; 
?>  
 
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="library.css">
</head>

<body>
<h1 id="title">Book Checkout</h1>
	<div class="parent">
		<div class="child-centralise">
		<?php

		session_start(); 

		$username = $_SESSION['username'];
		$today = date("Y-m-d");
		$plus = strtotime("+14 day", time());
		$estimate = date('Y-m-d', $plus);
		if(isset($_POST['isbn']) and isset($_POST['copyid']) and isset($_POST['issueid']))  {
			$isbn = $_POST['isbn'];
			$copyid = $_POST['copyid'];
			$issueid = $_POST['issueid'];
			$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
			mysqli_select_db($link, $database) or die( "Unable to select database");

			$sql_query = "Select Max(IssueID) AS givenissueid, IsChecked From issue AS I, bookcopy AS BC Where I.ISBN = '$isbn' AND I.CopyID = '$copyid' AND I.ISBN = BC.ISBN AND I.CopyID = BC.CopyID";

			$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
			{
				echo 'The query by ISBN failed.';
				exit();
			}
			$row = mysqli_fetch_array($result);
			$givenissueid = $row['givenissueid'];
			$ischecked = $row['IsChecked'];
			if($ischecked == 1) {
				echo 'Error: This book is checked out.';
			} elseif($issueid == $givenissueid) {
				$sql_query = "UPDATE issue AS I SET ExtenDate = '$today', IssueDate = '$today', ReturnDate = '$estimate' Where I.IssueID = '$issueid'";

				$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
				if($result == false){
					echo 'The query by ISBN failed.';
					exit();
				}

				$sql_query = "UPDATE bookcopy AS BC SET IsHold = 0, IsChecked = 1 Where BC.ISBN = '$isbn' AND BC.CopyID = '$copyid'";

				$result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
				if($result == false){
					echo 'The query by ISBN failed.';
					exit();
				}
				header('Location: ConfirmCheckout.php');		
			} else {
				echo 'Wrong IssueID';
			}
		}
?>
			<div class="justForNow">
				<form action="" method="post">
					<table>
						<tr>
							<td>Issue ID</td>
							<td><input class="input-box" type="text" name="issueid" required /></td>
						</tr>
						<tr>
							<td>ISBN</td>
							<td><input class="input-box" type="text" name="isbn" required /></td>
						</tr>
						<tr>
							<td>Copy Number</td>
							<td><input class="input-box" type="text" name="copyid" required /></td>
						</tr>

						<tr>
							<td>Username</td>
							<td><?php echo $username; ?></td>
						</tr>

						<tr>
							<td>Check Out Date</td>
							<td><?php echo $today; ?></td>
						</tr>

						<tr>
							<td>Estimated Return Date</td>
							<td><?php echo $estimate; ?></td>
						</tr>

					</table>
					<span class="justForNow"><input class="primary-button normalise" type="submit" value="Confirm" /></span>
				</form>
			</div>
			<div class="justForNow">
				<form action="UserSummary.php" method="post">
				<span class="justForNow"><input class="secondary-button" type="submit" value="Cancel" /></span>
				</form>
			</div>
		</div>
	</div>
</body>
</html>