<?php
include_once 'classes/Model/Comment.php';
include_once 'classes/Controller/Controller.php';
include_once 'classes/Util/Util.php';
include_once 'classes/Controller/SessionManager.php';

Util::initRequest();
$commentRaw = $_REQUEST['comment'];
$page = $_REQUEST['page'];
$comment = htmlentities($commentRaw, ENT_QUOTES);

$controller = SessionManager::getController();

if ($page == "Swedish Meatballs") 
    $controller->addComment($comment);
else
    $controller->addCommentP($comment);

// include 'recipeMeatballsDynamic.php';

$controller = SessionManager::storeController($controller);
?>
