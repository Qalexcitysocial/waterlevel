<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <title>Garden at Home</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <!--Water Tank GAUGE -->
    <script type="text/javascript">
        google.load("visualization", "1", {packages: ["gauge"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Water Tank', <?php
  $servername = "localhost";
  $username = "datalogger";
  $password = "datalogger";
  $dbname = "datalogger";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT (`distance`) FROM `distance` ORDER BY ttime DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

        echo $row["distance"];
    }
} else {
    echo "0 results";
}

                    mysqli_close($conn);
                    ?>
                ],

            ]);

            var options = {
                width: 400, height: 200,
                greenFrom: 0, greenTo:50,
                redFrom: 75.5, redTo: 100,
                yellowFrom: 50, yellowTo: 75.5,
                minorTicks: 1
            };

            var chart = new google.visualization.Gauge(document.getElementById('charttemp_div'));

            chart.draw(data, options);

        }
    </script>

</head>
<body>
<div class="container">
    <h3>Current Conditions</h3>
    <div class="row">
        <div class="col-sm-3">
            <div id="charttemp_div" style="width: 200px; height: 200px;"></div>
        </div>
    </div>
    <hr>
</div>
</body>
</html>
