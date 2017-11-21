<?php
session_start(); 

$comment = $_REQUEST['comment'];
echo "comment: <br> ";
var_dump($comment);
$user = $_SESSION['user'];
echo "user: <br> ";
var_dump($user);
$time = time();
echo "timestamp: <br> ";
var_dump($time);
include_once "Comment.php";


$servername = "localhost";
$username = "root";
$password = "MySQLPethrus15";
$nameDB = "recipies";
$commentTB = "commentP";

$myComment = new Comment($user, $comment, $time);
$serial = serialize($myComment);


$conn = new mysqli($servername, $username, $password, $nameDB);

// Check connection
if (!$conn) {
    echo "No connection";
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";

$addComment = "INSERT INTO $commentTB (time, comment) VALUES
	   ('$time', '$serial')";

if ($conn->query($addComment) === TRUE) {
    echo "Comment added successfully <br>";
} else {
    echo "Error";
}
header('Location:recipePancakesDynamic.php');
exit();

?>
