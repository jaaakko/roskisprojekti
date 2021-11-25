<?php 
require "database/models/sensordata.php";
require "database/connection.php";

function viewIndexController()
{
    $allData = getAllSensorData();
    require "views/index.view.php";
}
?>