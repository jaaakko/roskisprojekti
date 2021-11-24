<?php 
require_once 'controllers/indexController.php';
$route = explode("?", $_SERVER["REQUEST_URI"])[0];

switch ($route) {
    case "/":
    viewIndexController();
    break;
}

?>