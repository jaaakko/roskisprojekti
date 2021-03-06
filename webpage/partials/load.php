<?php 
require "../database/models/sensordata.php";
require "../database/connection.php";
$allData = getAllSensorData();
foreach($allData as $sensordata)?>

<h2>Roskan tyyppi: <?=$sensordata["type"]?></h2>
<p id="distance">Roskan etäisyys kannesta: <?=$sensordata["value"], " " ,$sensordata["units"]?></p>
<p id="time">Viimeisin tarkistus: <?=$sensordata["time"]?></p>

<?php if($sensordata["value"] <= 22) {
    echo "<div class='full'></div>";
    echo "<div class='full'></div>";
    echo "<div class='full'></div>";
    echo "<div class='full'></div>";

} else if($sensordata["value"] <= 40 && $sensordata["value"] > 22) {
    echo "<div class='empty'></div>";
    echo "<div class='almost_full'></div>";
    echo "<div class='almost_full'></div>";
    echo "<div class='almost_full'></div>";

} else if($sensordata["value"] <=60 && $sensordata["value"] > 40) {
    echo "<div class='empty'></div>";
    echo "<div class='empty'></div>";
    echo "<div class='semi_full'></div>";
    echo "<div class='semi_full'></div>";

} else if($sensordata["value"] <=80 && $sensordata["value"] > 60) {
    echo "<div class='empty'></div>";
    echo "<div class='empty'></div>";
    echo "<div class='empty'></div>";
    echo "<div class='almost_empty'></div>";

} else if($sensordata["value"] > 80) {
    echo "<div class='empty'></div>";
    echo "<div class='empty'></div>";
    echo "<div class='empty'></div>";
    echo "<div class='empty'></div>";
}
?>
<div class="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>
    
    <!-- javascript -->
    <script type="text/javascript" src="/chart/js/jquery.min.js"></script>
    <script type="text/javascript" src="/chart/js/Chart.min.js"></script>
    <script type="text/javascript" src="/chart/js/linegraph.js"></script>