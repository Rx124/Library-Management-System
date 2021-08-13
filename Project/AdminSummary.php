<html>
<head>
    <title> Admin Side</title>
	<link rel="stylesheet" href="library.css">
</head>
<body>
    <div id="title">
        <h1>Admin Privileges</h1>
    </div>
    <div class="parent">
    <div class="child-centralise">
        <br>
    <form action="PopularSubjectReport.php" method="post">
        <input class="primary-button large" style="width: 100%" type="submit" value="Subject Checkout Report" />
    </form>

    <form action="FrequentUsersReport.php" method="post">
        <input class="primary-button large" style="width: 100%" type="submit" value="Frequent User Report" />
    </form>

    <form action="PopularBooksReport.php" method="post">
        <input class="primary-button large" style="width: 100%" type="submit" value="Popular Books Report" />
    </form>

    <form action="DamagedBooksReport.php" method="post">
        <input class="primary-button large" style="width: 100%" type="submit" value="Damaged Books Report" />
    </form>

    <form action="LostDamagedBook_Admin.php" method="post">
        <input class="primary-button large" style="width: 100%" type="submit" value="Lost/Damaged Book" />
    </form>

    <form action="Login.php" method="post">
        <input class="secondary-button large" style="width: 100%" type="submit" value="Close" />
    </form>
    </div>
    </div>
</body>

</html>