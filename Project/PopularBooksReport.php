<?php
include 'dbinfo.php';
?>
<?php

session_start();


$link = mysqli_connect($host, $user, $pass) or die("Unable to connect");
mysqli_select_db($link, $database) or die("Unable to select database");

$sql_query1 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 1 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 1 Order by checkoutnum DESC LIMIT 3";

$result1 = mysqli_query($link, $sql_query1)  or die(mysqli_error($link));
if ($result1 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query2 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 2 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 2 Order by checkoutnum DESC LIMIT 3";

$result2 = mysqli_query($link, $sql_query2)  or die(mysqli_error($link));
if ($result2 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query3 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 3 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 3 Order by checkoutnum DESC LIMIT 3";

$result3 = mysqli_query($link, $sql_query3)  or die(mysqli_error($link));
if ($result3 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query4 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 4 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 4 Order by checkoutnum DESC LIMIT 3";

$result4 = mysqli_query($link, $sql_query4)  or die(mysqli_error($link));
if ($result4 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query5 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 5 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 5 Order by checkoutnum DESC LIMIT 3";

$result5 = mysqli_query($link, $sql_query5)  or die(mysqli_error($link));
if ($result5 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query6 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 6 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 6 Order by checkoutnum DESC LIMIT 3";

$result6 = mysqli_query($link, $sql_query6)  or die(mysqli_error($link));
if ($result6 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query7 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 7 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 7 Order by checkoutnum DESC LIMIT 3";

$result7 = mysqli_query($link, $sql_query7)  or die(mysqli_error($link));
if ($result7 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query8 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 8 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 8 Order by checkoutnum DESC LIMIT 3";

$result8 = mysqli_query($link, $sql_query8)  or die(mysqli_error($link));
if ($result8 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query9 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 9 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 9 Order by checkoutnum DESC LIMIT 3";

$result9 = mysqli_query($link, $sql_query9)  or die(mysqli_error($link));
if ($result9 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query10 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 10 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 10 Order by checkoutnum DESC LIMIT 3";

$result10 = mysqli_query($link, $sql_query10)  or die(mysqli_error($link));
if ($result10 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query11 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 11 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 11 Order by checkoutnum DESC LIMIT 3";

$result11 = mysqli_query($link, $sql_query11)  or die(mysqli_error($link));
if ($result11 == false) {
  echo 'The query by ISBN failed.';
  exit();
}

$sql_query12 = "Select Title, checkoutnum From (Select Month(IssueDate) AS month, Title, Count(IssueID) AS checkoutnum From book AS B, issue AS I
	Where B.ISBN = I.ISBN AND Month(IssueDate) = 12 AND ExtenDate IS NOT NULL
	Group by month, Title) AS V Where month = 12 Order by checkoutnum DESC LIMIT 3";

$result12 = mysqli_query($link, $sql_query12)  or die(mysqli_error($link));
if ($result12 == false) {
  echo 'The query by ISBN failed.';
  exit();
}
?>
<html>

<head>
  <title>Popular books</title>
  <link rel="stylesheet" href="library.css">
</head>

<body>
  <div id="title">
    <h1>Popular Books Report</h1>
  </div>
  <div class="parent">
    <div class="child-centralise" style="width: 100%;">
      <div class="justForNow">
        <form action="AdminSummary.php" method="post">
          <table border="1" style="width:100%">
            <tr>
              <th>Month</th>
              <th>User Name</th>
              <th>#chechouts</th>
            </tr>
            <?php while ($row1 = mysqli_fetch_array($result1)) {

              $Title = $row1['Title'];
              $checkoutnum = $row1['checkoutnum'];
            ?>
              <tr>
                <td>January</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row2 = mysqli_fetch_array($result2)) {

              $Title = $row2['Title'];
              $checkoutnum = $row2['checkoutnum'];
            ?>
              <tr>
                <td>February</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row3 = mysqli_fetch_array($result3)) {

              $Title = $row3['Title'];
              $checkoutnum = $row3['checkoutnum'];
            ?>
              <tr>
                <td>March</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row4 = mysqli_fetch_array($result4)) {

              $Title = $row4['Title'];
              $checkoutnum = $row4['checkoutnum'];
            ?>
              <tr>
                <td>April</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row5 = mysqli_fetch_array($result5)) {

              $Title = $row5['Title'];
              $checkoutnum = $row5['checkoutnum'];
            ?>
              <tr>
                <td>May</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row6 = mysqli_fetch_array($result6)) {

              $Title = $row6['Title'];
              $checkoutnum = $row6['checkoutnum'];
            ?>
              <tr>
                <td>June</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row7 = mysqli_fetch_array($result7)) {

              $Title = $row7['Title'];
              $checkoutnum = $row7['checkoutnum'];
            ?>
              <tr>
                <td>July</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row8 = mysqli_fetch_array($result8)) {

              $Title = $row8['Title'];
              $checkoutnum = $row8['checkoutnum'];
            ?>
              <tr>
                <td>August</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row9 = mysqli_fetch_array($result9)) {

              $Title = $row9['Title'];
              $checkoutnum = $row9['checkoutnum'];
            ?>
              <tr>
                <td>September</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row10 = mysqli_fetch_array($result10)) {

              $Title = $row10['Title'];
              $checkoutnum = $row10['checkoutnum'];
            ?>
              <tr>
                <td>October</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row11 = mysqli_fetch_array($result11)) {

              $Title = $row11['Title'];
              $checkoutnum = $row11['checkoutnum'];
            ?>
              <tr>
                <td>November</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>
            <?php while ($row12 = mysqli_fetch_array($result12)) {

              $Title = $row12['Title'];
              $checkoutnum = $row12['checkoutnum'];
            ?>
              <tr>
                <td>December</td>
                <td><?php echo $Title; ?></td>
                <td><?php echo $checkoutnum; ?></td>
              </tr>
            <?php
            }
            ?>

          </table>
          <span class="justForNow"><input type="submit" class="secondary-button" value="Back" /></span>
        </form>
      </div>
    </div>
  </div>

</body>

</html>