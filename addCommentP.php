<?php
include_once 'classes/Model/Comment.php';
include_once 'classes/Controller/Controller.php';
include_once 'classes/Util/Util.php';
include_once 'classes/Controller/SessionManager.php';

$commentRaw = $_REQUEST['comment'];
$comment = htmlentities($commentRaw, ENT_QUOTES);

Util::initRequest();
$controller = SessionManager::getController();

$controller->addCommentP($comment);

include 'recipePancakesDynamic.php';

$controller = SessionManager::storeController($controller);
?>
