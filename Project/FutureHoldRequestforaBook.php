<?php
include 'dbinfo.php'; 
?>  
<?php

session_start(); 

$username = $_SESSION['username'];
?> 
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="library.css">
</head>

<body>
    <h1 id="title">Future Hold Request for a Book</h1>

    <div class="parent">
        <div class="child-centralise">
            <div class="justForNow">
                <form action="FutureHoldRequestResult.php" method="post">
                    <table>
                        <tr>
                            <td>ISBN</td>
                            <td><input class="input-box" type="text" name="isbn" required /></td>
                        </tr>
                    </table>
                    <span class="justForNow"><input class="primary-button" style="width: 70px;" type="submit" value="Request" /></span>
                </form>
            </div>
            <div class="justForNow">
                <form action="UserSummary.php" method="post">
                <input class="secondary-button" type="submit" value="Back" />
                </form>

            </div>
        </div>
    </div>

</body>

</html>