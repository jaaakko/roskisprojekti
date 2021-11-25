<?php require "partials/head.php"; ?>

<div class="container">

<script>

var myVar = setInterval(myTimer, 1000);
function myTimer() {
  var d = new Date();
  document.getElementById("trash_unit").innerHTML = d.toLocaleTimeString();
}
</script>

<?php
foreach($allData as $sensordata): ?>
<div class="trash_unit" id="trash_unit">
<h2>Roskan tyyppi: <?=$sensordata["type"]?></h2>
<p>Roskan etäisyys kannesta: <?=$sensordata["value"]?></p>
</div>

<?php require "partial/footer.php"; ?>