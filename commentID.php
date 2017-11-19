<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Register new user </title>
</head>
<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

	$timestamp = $_REQUEST['timestamp'];
	$comment = $_REQUEST['comment'];
	foreach ($_REQUEST as $key => $value) {
            echo("Name: $key has Value: $value <br>");
	}
    }

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

    $addComment = "INSERT INTO $commentTB (time, user, comment) VALUES
    ('$timestamp', 'Arne', '$comment')";

    if ($conn->query($addComment) === TRUE) {
	echo "User added successfully <br>";
    } else {
	echo "Error adding user: <br>" . $conn->error;
    }
   
    ?>
</body>
</html>
