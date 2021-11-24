<?php 
require "database/models/sensordata.php";

function viewIndexController()
{
    $allData = getAllSensorData();
    require "views/index.view.php";
}
?>