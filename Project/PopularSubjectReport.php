<?php
include 'dbinfo.php';
?>
<?php

session_start();


$link = mysqli_connect($host, $user, $pass) or die("Unable to connect");
mysqli_select_db($link, $database) or die("Unable to select database");
?>

<html>

<head>
    <title>Popular Subjects</title>
    <link rel="stylesheet" href="library.css">
    <style type="text/css">
        BODY {
            background-color: #9ed0e6;
            width: 550PX;
        }

        #chart-container {
            width: 100%;
            height: auto;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


</head>

<body style="width: 88vw;">
    <div id="title" style="position: relative; left: 5.5%;">
        <h1>Subject checkout Report</h1>
    </div>
    <div class="parent">
        <div class="child-centralise" style="width: 100%;" >
            <div class="justForNow">
                <form action="AdminSummary.php" method="post">
                    <div id="chart-container" class="parent" style="position: relative; top:-7%; left:5%; height:74%; width:60vw">
                        <canvas id="graphCanvas"></canvas>
                    </div>
                    <span class="justForNow" style="position: relative; left: 5.5%"><input type="submit" class="secondary-button" value="Back" /></span>
                </form>
            </div>
        </div>
    </div>

    <script>
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var data1;
        Chart.scaleService.updateScaleDefaults('linear', {
            ticks: {
                min: 0
            }
        });
        $(document).ready(function() {
            showGraph();
        });


        function showGraph() {
            {
                $.post("data.php",
                    function(data) {
                        data = JSON.parse(data);
                        data1 = data;
                        console.log(data);
                        var subname = [];
                        var icount = [];

                        for (var i in data) {
                            subname.push(data[i].subname + ", " + months[data[i].month - 1]);
                            icount.push(data[i].copynum);

                        }

                        var chartdata = {
                            labels: subname,
                            options: {
                                yAxes: [{
                                    display: true,
                                    ticks: {
                                        beginAtZero: true,
                                    }
                                }],

                            },
                            datasets: [{
                                label: 'Month and Subject wise Book Checkout',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                barPercentage: 0.5,
                                barThickness: 6,
                                maxBarThickness: 8,
                                minBarLength: 2,
                                data: icount,
                                min: 0,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.8)',
                                    'rgba(54, 162, 235, 0.8)',
                                    'rgba(255, 206, 86, 0.8)',
                                    'rgba(75, 192, 192, 0.8)',
                                    'rgba(153, 102, 255, 0.8)',
                                    'rgba(255, 159, 64, 0.8)',
                                    'rgba(0, 0, 0, 0.8)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        };

                        var graphTarget = $("#graphCanvas");

                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata
                        });
                    });
            }
        }
    </script>

</body>

</html>