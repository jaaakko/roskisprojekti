<?php

function getAllSensorData() {
    $pdo = connectDB();
    $sql = "SELECT * FROM sensordata INNER JOIN trash_type ON sensordata.typeID = trash_type.typeID";
    $stm = $pdo->prepare($sql);
    $stm->execute();

    $allData = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $allData;
}

?>