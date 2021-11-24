<?php

function getAllSensorData() {
    $pdo = connectDB();
    $stm = $pdo -> query($sql);
    $sql = "SELECT * FROM sensordata";
    $stm = $pdo->prepare($sql);
    $stm->execute();

    $allData = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $allData;
}

?>