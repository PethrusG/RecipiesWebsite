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

	  $newUserName = $_REQUEST['newUserName'];
	  $newPassword = $_REQUEST['newPassword'];

	  // Set session variables
	  $_SESSION["user"] = $newUserName;	    	
      }

      $controller->registerUser($newUserName, $newPassword);
      SessionManager::storeController($controller);
      ?>
      <h3> Welcome <?php $_SESSION["user"] ?>, you're now registered! </h3>
	<form action = "recipeMeatballsDynamic.php">
	    <input type ="submit" value = "Back to recipies">
	</form>
	<br>
	<?php

	// Retrieve all object of type Comment from DB
 	/* $commentsFromDB = $conn->prepare("SELECT comment FROM commentsObj");
	   $commentsFromDB->execute();
	   $array = [];
	   foreach ($commentsFromDB->get_result() as $row)	{
	   $array[] = $row['comment'];
	   }*/

	// For use in other pages
//	$_SESSION["Comments"] = $array;
//	echo "SESSION contains: <br>";
//	print_r($_SESSION);

//	echo "This is array in registerUserDB.";
//	print_r($array);
//	echo $array[1]->getUser();

	// Unserialize all object Comments from DB
	/* $arrayUns = [];
	   for ($i = 0; $i < count($array); $i++){
	   $arrayUns[$i] = unserialize($array[$i]);
	   }*/

	// Display comments with user to the browser
?>
    </body>
    
</html>

