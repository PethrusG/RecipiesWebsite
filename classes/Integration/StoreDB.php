<?php
class StoreDB {

    public $servername;
    public $username;
    public $password;
    public $nameDB;
    public $userTB;
    public $commentTB;
    public $conn;

    public function __construct() {
  	$this->servername = "localhost";
	$this->username = "root";
	$this->password = "MySQLPethrus15";
	$this->nameDB = "recipies";
	$this->userTB = "users";
	$this->commentTB = "commentsObj";
	$this->conn = $this->connectToDB();
    }
    
    function connectToDB() {

	// Make connection to database(DB)
	$connection = new mysqli("localhost", "root", "MySQLPethrus15", "recipies");

	// Check connection
	if (!$connection) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	return $connection;
    }

    function retrieveComments() {
	//	$connection = $this->conn;
	$connection = $this->connectToDB();

	$entries = $connection->prepare("SELECT comment FROM commentsObj"); 
//	$entries = $connection->prepare("SELECT comment FROM commentsObj");
	$entries->execute();

	$array = [];
	foreach ($entries->get_result() as $row)	{
	    $array[] = $row['comment'];
	}

	// Unserialize all object Comments
	for ($i = 0; $i < count($array); $i++) {
	    $arrayUns[$i] = unserialize($array[$i]);
	}
	return $arrayUns;
    }

    function retrieveCommentsP() {
	//	$connection = $this->conn;
	$connection = $this->connectToDB();

	$entries = $connection->prepare("SELECT comment FROM commentP"); 
//	$entries = $connection->prepare("SELECT comment FROM commentsObj");
	$entries->execute();

	$array = [];
	foreach ($entries->get_result() as $row)	{
	    $array[] = $row['comment'];
	}

	// Unserialize all object Comments
	for ($i = 0; $i < count($array); $i++) {
	    $arrayUns[$i] = unserialize($array[$i]);
	}
	return $arrayUns;
    }

    // Returns all comments and adds delete buttons to user's comments
    function retrieveCommentsUser($user) {
	$connection = $this->connectToDB();
	$entries = $connection->prepare("SELECT comment FROM $this->commentTB");
	$entries->execute();

    }


    function addComment($timestamp, $comment) {
	$connection = $this->connectToDB();
	$commentTB = $this->commentTB;
	$entries = $connection->prepare("INSERT INTO commentsObj (time, 
                           comment) VALUES ('$timestamp', '$comment')");
	$entries->execute();
    }

    function addCommentP($timestamp, $comment) {
	$connection = $this->connectToDB();
	$commentTB = $this->commentTB;
	$entries = $connection->prepare("INSERT INTO commentP (time, 
                           comment) VALUES ('$timestamp', '$comment')");
	$entries->execute();
    }

    function registerUser($newUser, $newPassword) {
	$connection = $this->connectToDB();
	$entries = $connection->prepare("INSERT INTO users (name, password) VALUES
        ('$newUser', '$newPassword')");
	$entries->execute();
    }

    function retrieveUserPassword($userName, $passwordReq) {
	$connection = $this->connectToDB();
	$entries = $connection->prepare("SELECT password FROM users WHERE 
                                               name = '$userName';");
	$entries->execute();
	$array = [];
	/* foreach ($entries->get_result() as $row) {
	   $array[] = $row['password'];
	   }

	   if ($array[0] == $passwordReq)
	   return TRUE;
	   else 
	   return FALSE;*/

	foreach ($entries->get_result() as $row) {
	    $array[] = $row['password'];
	}

	if (password_verify($passwordReq, $array[0]))
	    return TRUE;
	else 
	    return FALSE;
    }

    function deleteCommentP($timestamp) {
	$connection = $this->connectToDB();
	$entries = $connection->prepare("DELETE FROM commentP
                                        WHERE time='$timestamp'");
	$entries->execute();
    }

    function deleteComment($timestamp) {
	$connection = $this->connectToDB();
	$entries = $connection->prepare("DELETE FROM commentsObj
                                        WHERE time='$timestamp'");
	$entries->execute();
    }
}
?>

