<?php 
require_once 'controllers/indexController.php';

switch ($route) {
    case "/":
    viewIndexController();
    break;
}

?>