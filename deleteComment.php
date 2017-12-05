<?php 

include_once 'classes/Model/Comment.php';
include_once 'classes/Controller/Controller.php';
include_once 'classes/Util/Util.php';
include_once 'classes/Controller/SessionManager.php';

Util::initRequest();
$controller = SessionManager::getController();

$timestamp = $_SESSION["timestamp"];
$userComment = $_SESSION["userComment"];
$user = $controller->getCurrentUser();
$controller->deleteComment($timestamp);

include 'recipeMeatballsDynamic.php';

SessionManager::storeController($controller);
?>
