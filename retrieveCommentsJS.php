<?php
include_once 'classes/Model/Comment.php';
include_once 'classes/Controller/Controller.php';
include_once 'classes/Util/Util.php';
include_once 'classes/Controller/SessionManager.php';

Util::initRequest();
$controller = SessionManager::getController();
$page = $_REQUEST['page'];

if ($page == "Swedish Meatballs") 
    $comments = $controller->retrieveComments();
else
    $comments = $controller->retrieveCommentsP();
// $comment = $comments[0];
// $myComment = $comments[0]->comment;
// echo \json_encode($myComment);
echo \json_encode($comments);
// FOR DEBUGGING:
// echo  "$page";
// die();


// echo \json_encode($controller->retrieveComments());

// include 'recipeMeatballsDynamic.php';

$controller = SessionManager::storeController($controller);
?>
