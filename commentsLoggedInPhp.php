<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Displaying comments in database</title>

</head>
<body>
    <h3> Old comments: </h3>
    <?php
    $currentUser = $_SESSION["currentUser"];
    echo "Current user is " . $currentUser;

    $servername = "localhost";
    $username = "root";
    $password = "MySQLPethrus15";
    $nameDB = "recipies";
    $userTB = "users";
    $commentTB = "comments";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $nameDB);

    // Check connection
    if (!$conn) {
	echo "No connection";
	die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully <br>";

    // Retrieve old comments;
//    $getComments = "SELECT

    ?>
	<h3> Type your comment here, <?php echo $currentUser . " " ?> </h3><br>
	<form action="commentAddDB.php" method="get">
		<input type="text" name="<?php time()?>">
		<input type="submit" value="Submit comment">
	</form>



</body>
</html>
