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

	    $userName = $_REQUEST["userName"];
	    $passwordReq = $_REQUEST["password"];
	    //	    echo "userName from REQUEST: " . $userName;	 
	    
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

	// TODO: Fix so that this query to DB works
	// Check if user and password matches
	//	$loginUser = "SELECT * FROM users";
	$loginUser = "SELECT password FROM users WHERE name = '$userName';";
	//	echo "loginUser = " . $loginUser . "<br>";

	//	$result = mysqli_query($conn, $loginUser);
	
	$passwordDB = $conn->prepare($loginUser);
	$passwordDB->execute();
	// Password from DB
	/* print_r($result);
	   print_r($passwordDB);*/
	$array = [];

	foreach ($passwordDB->get_result() as $row)
	{
	    $array[] = $row['password'];
	}
	/* echo $array[0];
	   echo $passwordR*/
	if ($conn->query($loginUser) == TRUE) {
	    //	    echo "Password retrieved succesfully <br>";
	    // Set session variables
	    if ($array[0] == $passwordReq){
		$_SESSION["user"] = $userName; 
		echo '<h4> Welcome, you are now logged in! </h4><br>
		<form action = "recipePancakesDynamic.php">
		<input type ="submit" value = "Back to recipies">
		</form>
		<br>  ';
	    }
	    else
		echo '<h3> Wrong password, log in again </h3>	    
	    <form action = "loginUserP.php">
	    <input type ="submit" value = "Try to log in again">
	    </form>
	    <br>
            <form action = "recipePancakesDynamicLoggedOut.php">
      	    <input type ="submit" value = "Back to recipies">
	    </form>';
	    
	} else {
	    echo "Error retrieving password: <br>" . $conn->error;
	    print_r($conn->query($loginUser));
	}
	

//	echo $array[0] . "<br>";
	
	
	/* $passwordDBResult = $passwordDB->get_result();
	   print_r($passwordDBResult);
	   print_r($password);*/
	?>
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

