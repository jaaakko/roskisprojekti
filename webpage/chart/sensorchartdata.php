<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'truudeli18.net');
define('DB_USERNAME', 'truu18_monkey');
define('DB_PASSWORD', 'foRy7GfA6YTUgRtE');
define('DB_NAME', 'truu18_smart-trash-project');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT value, units, time from sensordata_hist ORDER BY time ASC");

//execute query
$result = $mysqli->query($query);
//print_r($result);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);