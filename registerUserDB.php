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
	include_once 'Comment.php';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	    $newUserName = $_REQUEST['newUserName'];
	    $newPassword = $_REQUEST['newPassword'];

	    // Set session variables
	    $_SESSION["user"] = $newUserName;	    	
	}

	$servername = "localhost";
	$username = "root";
	$password = "MySQLPethrus15";
	$nameDB = "recipies";
	$userTB = "users";
	$commentTB = "comments";

	// Make connection to database(DB)
	$conn = new mysqli($servername, $username, $password, $nameDB);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Add new user to table
	$addUser = "INSERT INTO $userTB (name, password) VALUES
        ('$newUserName', '$newPassword')";

	if ($conn->query($addUser) === TRUE) {
	    // echo "User added successfully <br>";
	} else {
	    // echo "Error adding user: <br>" . $conn->error;
	}

	// echo	"Current user according to SESSION: " . $_SESSION["user"];

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

