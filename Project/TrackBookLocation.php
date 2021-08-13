<html>
<head>
    <title>Track Book</title>
    <link rel="stylesheet" href="library.css">
</head>
<body>
<h1 id="title">Track Book Location</h1>
    <div class="parent">
        <div class="child-centralise">
            <div class="justForNow">
            <form action="TrackResult.php" method="post">
                <table>
                    <tr>
                        <td>ISBN</td>
                        <td><input class="input-box" type="text" name="isbn" required /></td>
                    </tr>
                </table>
                <span class="justForNow"><input class="primary-button" type="submit" value="Locate" /></span>
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