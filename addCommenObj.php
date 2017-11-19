<?php session_start() ?>
<!DOCTYPE html>
<html>d
    <head>
	<meta charset="UTF-8">
	<title>Retrieve comments as objects from database</title>
	<?php
	include_once 'Comment.php';
	
	$servername = "localhost";
	$username = "root";
	$password = "MySQLPethrus15";
	$nameDB = "recipies";
	$commentTB = "commentsObj";

	// Create connection

	$user1 = "Arne";
	$comment1 = "Kanoner kanoner";
	$timestamp1 = 444444;

	$user2 = "Agda";
	$comment2 = "Sega bitar";
	$timestamp2 = 555555;

	$user3 = "Bengt";
	$comment3 = "Bara baka bullar nu.";
	$timestamp3 = 777777;	        	
	
	$myComment1 = new Comment($user1, $comment1, $timestamp1);
	$myComment2 = new Comment($user2, $comment2, $timestamp2);
	$myComment3 = new Comment($user3, $comment3, $timestamp3);

	$serial1 = serialize($myComment1);
	$serial2 = serialize($myComment2);
	$serial3 = serialize($myComment3);
	
	//	echo "Kommentaren har följande värden: " .  $printComment;
	$conn = new mysqli($servername, $username, $password, $nameDB);
	
	// Check connection
	if (!$conn) {
	    echo "No connection";
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully <br>";

	$addComment1 = "INSERT INTO $commentTB (time, comment) VALUES
	   ('$timestamp1', '$serial1')";

	if ($conn->query($addComment1) === TRUE) {
	    echo "Comment1 added successfully <br>";
	} else {
	    echo "Error adding Comment1: <br>" . $conn->error;
	}

	$addComment2 = "INSERT INTO $commentTB (time, comment) VALUES
	   ('$timestamp2', '$serial2')";

	if ($conn->query($addComment2) === TRUE) {
	    echo "Comment2 added successfully <br>";
	} else {
	    echo "Error adding Comment2: <br>" . $conn->error;
	}

	$addComment3 = "INSERT INTO $commentTB (time, comment) VALUES
	   ('$timestamp3', '$serial3')";

	if ($conn->query($addComment3) === TRUE) {
	    echo "Comment3 added successfully <br>";
	} else {
	    echo "Error adding Comment3: <br>" . $conn->error;
	}

	
	/* $retrieveComments = "SELECT comment FROM commentsObj";

	   $commentsFromDB = $conn->query($retrieveComments);*/

 	$commentsFromDB = $conn->prepare("SELECT comment FROM commentsObj");
	$commentsFromDB->execute();
	$array = [];
	foreach ($commentsFromDB->get_result() as $row)
	{
	    $array[] = $row['comment'];
	}
//	print_r($array);
	echo "<br><br>";
	echo $array[1] . "<br><br>";
	$uns = unserialize($array[1]);
	$uns->getUser();

	$myComment1->getUserComment();
	
	?>
    </head>
    <body>

    </body>
    <!--         $myComment = new Comment("Agda", "Sega bitar", "98776876");
	 echo "getuser() from Comment before serialization <br>";
	 $myComment->getUser();
	 $serial = serialize($myComment);
	 $unSerial = unserialize($serial);
	 echo "getuser() from Comment after serialization <br>";
	 echo $unSerial->user; -->
</html>
