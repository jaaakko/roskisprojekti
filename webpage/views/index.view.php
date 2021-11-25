<?php require "partials/head.php"; ?>

<div class="container">

<?php foreach($allData as $sensordata)?>
<div class="trash_data">
<h2>Roskan tyyppi: <?=$sensordata["type"]?></h2>
<p>Roskan etäisyys kannesta: <?=$sensordata["value"], " " ,$sensordata["units"]?></p>
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
</div>
</div>
</div>