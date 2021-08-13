<html>
<?php
include 'dbinfo.php';
?>
<?php

session_start();

$username = $_SESSION['username'];
?>

<head>
    <title>Search</title>
    <link rel="stylesheet" href="library.css">
</head>

<body>
    <div id="title">
        <h1>Search Books</h1>
    </div>
    <div class="parent">
        <div class="child-centralise">
            <div class="justForNow">
                <form action="HoldRequestforaBook.php" method="post">
                    <table>
                        <tr>
                            <td>ISBN</td>
                            <td><input class="input-box" type="text" name="isbn" /></td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><input class="input-box" type="text" name="title" /></td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td><input class="input-box" type="text" name="author" /></td>
                        </tr>
                    </table>
                    <span class="justForNow"><input type="submit" style="width: 100px" class="primary-button" value="Search" /></span>
                </form>
            </div>
            <div class="justForNow">
                <form action="UserSummary.php" method="post">
                    <input type="submit" class="secondary-button" value="Back" />
                </form>
            </div>
            <div class="justForNow" style="margin-top: -5%">
                <form action="Login.php" method="post">
                    <input type="submit" class="secondary-button" value="Close" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>