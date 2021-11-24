<?php require "partials/head.php"; ?>

<div class="container">

<?php
foreach($allData as $sensordata): ?>
<div class="trash_unit">
<h2>Roskan tyyppi: <?=$sensordata["type"]?></h2>
<p>Roskan etäisyys kannesta: <?=$sensordata["value"]?></p>
</div>

<?php require "partial/footer.php"; ?>