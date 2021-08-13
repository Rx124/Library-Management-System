<?php
include 'dbinfo.php';
?>

<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="library.css">
	<style type="text/css">
		.child-centralise {
			position: fixed;
			right: 0.6%;
			height: 85%;
			width: 27%;
		}
		img{
			width: 60%;
			position: fixed;
			left: 5%;
			top: 140px;
		}
		@media(max-width: 875px) {
			.child-centralise {
				width: 100%;
				border: 2px solid #9ED0E6;
				border-radius: 5px;
				background-color: #9ED0E6;
				height: fit-content;
			}
			img{
				display: none;
			}
		}
	</style>
</head>

<body>
	<div id="title">
		<h1>Silkreads Library Login</h1>
	</div>
	<div class="parent">
		<img src="assets/homepage.svg">
		<div class="child-centralise">
			<div class="error">
				<?php
				session_start();

				if (isset($_POST['username']) and isset($_POST['password'])) {
					$username = $_POST['username'];
					$password = $_POST['password'];


					$_SESSION['username'] = $username;



					$link = mysqli_connect($host, $user, $pass) or die("Unable to connect");
					mysqli_select_db($link, $database) or die("Unable to select database");


					$sql_query = "Select U.Username From user as U, staff as S Where U.Username = '$username' AND U.Password = '$password' AND U.Username = S.Username";
					$result = mysqli_query($link, $sql_query)  or die(mysqli_error($link));
					if ($result == false) {
						echo 'The query failed.';
						exit();
					}
					if (mysqli_num_rows($result) == 1) {
						header('Location: AdminSummary.php');
					} else {


						$sql_query = "Select Username From user Where Username = '$username' AND Password = '$password'";
						$result = mysqli_query($link, $sql_query)  or die(mysqli_error($link));
						if ($result == false) {
							echo 'The query failed.';
							exit();
						}
						if (mysqli_num_rows($result) == 1) {
							header('Location: UserSummary.php');
						} else {
							$err = 'Incorrect username or password';
						}
						echo "$err";
					}
				}

				?>
			</div>
			<div class="justForNow" style="position: relative; top: 20%">
				<form action="" method="post">
					Username: <br>
					<input class="input-box" name="username" type="text" placeholder="19BIT0179">
					<br>
					Password: <br>
					<input class="input-box" name="password" type="password">
					<br>
					<span class="justForNow"><input class="primary-button" type="Submit" value="Login" /></span>
				</form>
			</div>
			<div class="justForNow" style="position: relative; top: 20%; padding-top:0">
				<form action="NewUserRegistration.php" method="post">
					<div style="font-size: larger; text-align: center; width: inherit;">OR</div><br>
					<input class="secondary-button" style="width:110px;" type="Submit" value="Create Account" />
				</form>
			</div>
		</div>
	</div>
</body>

</html>