<?php
include_once 'classes/Model/Comment.php';
include_once 'classes/Controller/Controller.php';
include_once 'classes/Util/Util.php';
include_once 'classes/Controller/SessionManager.php';
include_once 'classes/Model/User.php';

Util::initRequest();
$controller = SessionManager::getController();

// $currentUser = $controller->getCurrentUser();
// var_dump($currentUser);
// $myObj->user= $currentUser;

$currentUser = new User($controller);
// $currentUser = $controller->getCurrentUser();

// $myJSON = json_encode($myObj);
// echo $myJSON;
// echo \json_encode("KALLE ÄR BÄST");
echo \json_encode($currentUser);
$controller = SessionManager::storeController($controller);
?>
