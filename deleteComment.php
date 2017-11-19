<?php session_start() ?>
<?php 
include_once 'Comment.php';

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
// Delete comment from Comment table
$time = $_SESSION["timestamp"];

// Check if comment is written by current user

if ($_SESSION["user"] == $_SESSION["userComment"]

$delComm = "DELETE FROM commentsObj WHERE time='$time'";

if ($conn->query($delComm) === TRUE) {
    echo "Comment deleted successfully <br>";
} else {
    echo "Error deleting comment <br>" . $conn->error;
}

echo 	"Current user according to SESSION: " . $_SESSION["user"];
echo 	"Comment timestamp according to SESSION: " . $_SESSION["timestamp"];
// $checkAdded = "SELECT * FROM " . $userDB;


?>
