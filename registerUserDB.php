<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
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
	    
	    //     if (empty($name)) {
	    //         echo "Name is empty";d
	    //     } else {
	    //         echo $name;
	    //     }
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
	    echo "No connection";
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully <br>";

	// Add new user to table
	$addUser = "INSERT INTO $userTB (name, password) VALUES
        ('$newUserName', '$newPassword')";

	/* if ($conn->query($addUser) === TRUE) {
	   echo "User added successfully <br>";
	   } else {
	   echo "Error adding user: <br>" . $conn->error;
	   }*/

	echo 	"Current user according to SESSION: " . $_SESSION["user"];
	// $checkAdded = "SELECT * FROM " . $userDB;

	?>
	<h3> Welcome <?php $_SESSION["user"] ?>, you're now registered! </h3>
	<form action = "recipeMeatballsDynamic.php">
	    <input type ="submit" value = "Back to recipies">
	</form>
	<br>
	<h4>Comments:</h4>
	<?php

	// Retrieve all object of type Comment from DB
 	$commentsFromDB = $conn->prepare("SELECT comment FROM commentsObj");
	$commentsFromDB->execute();
	$array = [];
	foreach ($commentsFromDB->get_result() as $row)	{
	    $array[] = $row['comment'];
	}

	// For use in other pages
	$_SESSION["Comments"] = $array;
	echo "SESSION contains: <br>";
	print_r($_SESSION);

	echo "This is array in registerUserDB.";
	print_r($array);
	echo $array[1]->getUser();
	
	/* foreach($array as $value){
	   $unsUsComm = unserialize($value);
	   $unsUsComm->getUserComment();
	   echo "<br>";
	   }*/

	// Unserialize all object Comments from DB
	$arrayUns = [];
	for ($i = 0; $i < count($array); $i++){
	    $arrayUns[$i] = unserialize($array[$i]);
	}

	// Display comments with user to the browser
	foreach ($arrayUns as $value){ ?>
	    <h3><?php  echo  $value->getUser(); ?> </h3>
	    <i><?php  echo  $value->getComment(); ?> </i><?php 
	} ?>

    </body>

    <!-- 	//	print_r($array);
	 echo "<br> Comments before unserialization: <br>";

	 foreach($array as $value){
	 echo $value . "<br>";
	 }
	 
	 foreach($array as $value){	   
	 $uns = unserialize($value);
	 $uns->getComment();
	 }

	 echo "<br>";
	 
	 foreach($array as $value){	   
	 $unsVal = unserialize($value);
	 $unsVal->getUser();
	 } -->
    
</html>

