<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <title>Garden at Home</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/led.css">
    <script type="text/javascript" src="js/tanks.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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

    <p><?php echo date('H:i:s m-d-Y');?>


            <div class="row">
        <div class="col-sm-3">
            <div id="charttemp_div" style="width: 200px; height: 200px;"></div>
        </div>
        <table class = "table">
            <thead>
              <tr>
                <th> Full</th>
                   <th>Medium</th>
                 <th>Empty</th>
              </tr>
            </thead>
            <tr class="success">
            </tr>
    </div>
    </table>
    <script>
        $( function() {
            var $winHeight = $( window ).height()
            $( '.container' ).height( $winHeight );
        });

    </script>
    <div class="led-box">
        <div class="led-green"></div>
    </div>
    <div class="led-box">
        <div class="led-yellow"></div>
    </div>
    <div class="led-box">
        <div class="led-red"></div>
    </div>
    </script>
</div>


<!--Water Tank BAR -->
<div id="chart_div" style="width: 200px; height: 500px;"></div>

    <script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Capacity total',0,0, <?php
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
    ,100],


// Treat first row as data as well.
], true);

var options = {
legend:'none'
};

var chart = new google.visualization.CandlestickChart(document.getElementById('chart_div'));

chart.draw(data, options);
}
</script>
    <hr>
    <?php include 'php/footer.php'; ?>
</div>
</body>
</html>
