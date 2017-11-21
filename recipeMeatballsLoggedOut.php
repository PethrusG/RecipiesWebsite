<?php
session_start();
?>

<!DOCTYPE html>
<!-- USE THIS PAGE IF LOGGED IN -->
<html>
<head>
<meta charset="UTF-8">
<title>Swedish Meatballs</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/styleFeatured.css">
</head>
<body>
<div class="header">
<div>
    <a href="index.html"><img src="images/logo.png" alt="Logo"></a>
</div>
</div>
<div class="body">
<div>
    <div class="header">
   <ul>
       <li>
	   <a href="index.html">Home</a>
       </li>
       <li>
	   <a href="calendar.html"> Calendar</a>
	   <li>
	   <li>
	       <a href="recipePancakes.html">Pancakes</a>
	   </li>
	   <li class="current">
	       <a href="recipeMeatballs.html">Meatballs</a>
   </ul>
    </div>
    <div class="body">
  <div id="content">
      <div>
   <div>
       <h3>Meatballs</h3>
       <p>
       </p>
       <a href="index.html"><img
				src="images/meatballsAbsolute.jpg"
				alt="Image"></a>
       <h5>INGREDIENTS</h5>
       <ol class="ingredients">
	   <li>
	       1 lb lean (at least 80%) ground beef
	   </li>
	   <li>
	       1/4 cup milk
	   </li>
	   <li>
	       1/2 teaspoon salt12 pcs
	   </li>
	   <li>
	       1 egg
	   </li>
	   <li>
	       1/4 teaspoon pepper
	   </li>
	   <li>
	       1 small onion, finely chopped (1/4 cup)
	   </li>
       </ol>
       <h5>DIRECTIONS</h5>
       <ol class="directions">
	   <li>
	       Heat oven to 400°F. Line 13x9-inch pan with foil;
	       spray with cooking spray.
	   </li>
	   <li>
	       In large bowl, mix all ingredients. Shape mixture into 20 to
	       24 (1 1/2-inch) meatballs. Place 1 inch apart in pan.
	   </li>
	   <li>
	       Bake uncovered 18 to 22 minutes or until no longer pink in
	       center.
	   </li>
       </ol>
   </div>
   <div>
       <h4> Add a comment </h4>
   </div>
   
   <?php
   include_once 'Comment.php';			    
   //	  $array = $_SESSION["Comments"];

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
   
   // Retrieve all object of type Comment from DB
   $commentsFromDB = $conn->prepare("SELECT comment FROM commentsObj");
   $commentsFromDB->execute();
   $array = [];
   foreach ($commentsFromDB->get_result() as $row)	{
       $array[] = $row['comment'];
   }
   // Unserialize all object Comments from DB
   $arrayUns = [];
   for ($i = 0; $i < count($array); $i++){
       $arrayUns[$i] = unserialize($array[$i]);
   }

   // Display comments with user to the browser
   foreach ($arrayUns as $value){ ?>
       <div> <form class ="comments" action="deleteComment.php">
		  <input type="hidden" value="<?php $value->getTimestamp(); ?>"
			 name="timestamp">
		  <input type="hidden" value="<?php $value->getUser(); ?>"			             name="userComment">				
	     </form></div>

   <i> <h4><?php  echo  $value->getUser(); ?> </h4>
    <?php  echo  $value->getComment(); ?> </i><?php 
						 } ?><br>

   <form  action = "addComment.php" method="post">




       <input type = "text" name="comment" value = "Add your comment here">
       <input type ="hidden" name="timestamp" value = "<?php time() ?>">
       <input type ="submit" value ="Submit comment">
   </form>



      <div>  <button>Send</button></div>

    </form>
	  </div>
	    </div>
	</div>
    </div>
</div>


</div>
<div class="footer">
    <div>
	<p>
	    &copy; Copyright 2012. All rights reserved
	</p>
    </div>
</div>
</body>
</html>
