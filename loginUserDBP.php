<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/styleFeatured.css">
    <title> Register new user </title>
  </head>
  <body>
    <?php
    include_once 'classes/Model/Comment.php';
    include_once 'classes/Controller/Controller.php';
    include_once 'classes/Controller/SessionManager.php';

    $controller = SessionManager::getController();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userName = $_REQUEST["userName"];
	$passwordReq = $_REQUEST["password"];
    }

    $rightPassword = $controller->login($userName, $passwordReq);
    if($rightPassword == TRUE) {
	$controller->setCurrentUser($userName);
	include 'resources/loginSuccesful.php';
    }
    else
	include 'resources/loginFailed.php';

    SessionManager::storeController($controller);
    ?>
  </body>
</html>
