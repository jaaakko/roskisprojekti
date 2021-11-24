<?php

function getAllSensorData() {
    $pdo = connectDB();
    $stm = $pdo -> query($sql);
    $sql = "SELECT * FROM sensordata";
    $stm = $pdo->prepare($sql);
    $stm->execute();

    $kayttajat = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $kayttajat;
}

?>