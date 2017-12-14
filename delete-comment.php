<?php 

include_once 'classes/Model/Comment.php';
include_once 'classes/Controller/Controller.php';
include_once 'classes/Util/Util.php';
include_once 'classes/Controller/SessionManager.php';

$page = $_REQUEST['page'];
$timestamp = $_REQUEST['timestamp'];
Util::initRequest();
$controller = SessionManager::getController();

// $timestamp = $_SESSION["timestamp"];
// $userComment = $_SESSION["userComment"];
// $user = $controller->getCurrentUser();
if ($page == "Swedish Meatballs") 
    $controller->deleteComment($timestamp);
else
    $controller->deleteCommentP($timestamp);

// include 'recipeMeatballsDynamic.php';

SessionManager::storeController($controller);
?>
