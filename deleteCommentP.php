<?php session_start() ?>
<?php 
include_once 'Comment.php';

$servername = "localhost";
$username = "root";
$password = "MySQLPethrus15";
$nameDB = "recipies";
$userTB = "users";
$commentTB = "commentP";

// Make connection to database(DB)
$conn = new mysqli($servername, $username, $password, $nameDB);

// Check connection
if (!$conn) {
    echo "No connection";
    die("Connection failed: " . mysqli_connect_error());
}
// Delete comment from Comment table
// $time = $_SESSION["timestamp"];

$time = $_SESSION["timestamp"];
echo "Timestamp: " . $time . "<br>";
var_dump($time);
$userComment = $_SESSION["userComment"];
echo "UserComment: " . $userComment . "<br>";
var_dump($userComment);
$user = $_SESSION["user"];
echo "User: " . $user . "<br>";
var_dump($user);

// Check if comment is written by current user
//if ($userComment == $user){

$delComm = "DELETE FROM $commentTB WHERE time='$time'";
if ($conn->query($delComm) == TRUE) {
    echo "Comment deleted successfully <br>";
} else {
    echo "Error deleting comment <br>" . $conn->error;
}
//}
/* header("Location: recipeMeatballsDynamic.php");
 * exit();*/

/* echo 	"Current user according to SESSION: " . $_SESSION["user"];
 * echo 	"Comment timestamp according to SESSION: " . $_SESSION["timestamp"];
 * echo 	"Comment timestamp according to REQUEST: " . $_REQUEST["userComment"];*/
// $checkAdded = "SELECT * FROM " . $userDB;
header('Location: recipePancakesDynamic.php');
exit();

?>
