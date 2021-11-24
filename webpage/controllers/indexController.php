<?php 
function viewIndexCOntroller()
{
    $allData = getAllSensorData();
    require "views/index.view.php";
}
?>