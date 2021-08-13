<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['confirmpassword']))  {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['confirmpassword']=$confirmpassword;
	
	if($password == $confirmpassword) {
		$insertStatement = "INSERT INTO user (Username, Password) VALUES ('$username', '$password')";
		$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
		if($result == false) {
			echo 'The query failed.';
			exit();
		} else {
			header('Location: CreateProfile.php');
		}
	} else {
		echo 'password not consistent';
	}
}
?>

<html>
<head>
	<title>New Registration</title>
	<link rel="stylesheet" href="library.css">
</head>
<body>
<h1 id="title">New User Registration</h1>
	<div class="parent">
		<div class="child-centralise">
			<div class="justForNow">
				<form action="" method="post">
					<table>
						<tr>
							<td>Username:</td>
							<td><input class="input-box" type="text" name="username" required /></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input class="input-box" type="password" name="password" required /></td>
						</tr>

						<tr>
							<td>Confirm Password:</td>
							<td><input class="input-box" type="password" name="confirmpassword" required /></td>
						</tr>
					</table>

					<span class="justForNow"><input type="submit" style="width: 100px" class="primary-button" value="Register" /></span>
				</form>
			</div>
			<div class="justForNow">
				<form action="Login.php" method="post">
					<input type="submit" class="secondary-button" value="Back" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>