<?php require "partials/head.php"; ?>

<div class="container">

<?php foreach($allData as $sensordata);3 ?>

<div class="trash_unit" id="trash_unit">
<h2>Roskan tyyppi: <?=$sensordata["type"];?></h2>
<p>Roskan etäisyys kannesta: <?=$sensordata["value"];?></p>
</div>
</div>