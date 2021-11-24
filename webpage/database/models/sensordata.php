<?php

function getAllSensorData() {
    $pdo = connectDB();
    $sql = "SELECT * FROM sensordata";
    $stm = $pdo->prepare($sql);
    $stm->execute();

    $allData = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $allData;
}

?>