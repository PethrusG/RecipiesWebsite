<?php session_start(); ?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Swedish Pancakes</title>
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
	      <li class="current">
		<a href="recipePancakesDynamicLoggedOut.php">Pancakes</a>
	      </li>
	      <li>
		<a href="recipeMeatballsDynamicLoggedOut.php">Meatballs</a>
	  </ul>
	</div>
	<div class="body">
	  <div id="content">
	    <div>
	      <div>
		<h3>Pancakes</h3>
		<p>
		</p>
		<a href="index.php"><img src="images/pancakesAbsolute.jpg" alt="Image"></a>
		<h5>INGREDIENTS</h5>
		<ol class="ingredients">
		  <li>
		    1 c. all-purpose flour
		  </li>
		  <li>
		    2 tbsp. sugar
		  </li>
		  <li>
		    2 1/2 tsp. baking powder
		  </li>
		  <li>
		    1/2 tsp. salt
		  </li>
		  <li>
		    1 large egg
		  </li>
		  <li>
		    3 tbsp. butter, melted
		  </li>
		</ol>
		<h5>DIRECTIONS</h5>
		<ol class="directions">
		  <li>
		    Add milk, butter and egg; stir until flour is moistened.
		  </li>
		  <li>
		    Heat 12-inch nonstick skillet or griddle over medium heat until drop of water sizzles;
		    brush lightly with oil. In batches, scoop batter by scant 1/4-cupfuls into skillet,
		    spreading to 3 1/2 inches each.
		  </li>
		  <li>
		    Cook 2 to 3 minutes or until bubbly and edges are dry.
		    With wide spatula, turn; cook 2 minutes more or until golden. Transfer to platter or keep warm on a cookie sheet in 225°F oven.
		  </li>
		  <li>
		    Repeat with remaining batter, brushing griddle with more oil if necessary.
		  </li>
		</ol>
	      </div>

	      <?php
	      include_once 'Comment.php';

	      $servername = "localhost";
	      $username = "root";
	      $password = "MySQLPethrus15";
	      $nameDB = "recipies";
	      $userTB = "users";
	      $commentTB = "commentP";

	      $currentUser = $_SESSION["user"];
	      //        echo "CURRENT USER SESSION: " . $currentUser;

	      // Make connection to database(DB)
	      $conn = new mysqli($servername, $username, $password, $nameDB);

	      // Check connection
	      if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	      }

	      // Retrieve all object of type Comment from DB
	      $commentsFromDB = $conn->prepare("SELECT comment FROM $commentTB");
	      $commentsFromDB->execute();
	      $array = [];
	      foreach ($commentsFromDB->get_result() as $row)        {
		$array[] = $row['comment'];
	      }
	      //   $array = $_SESSION["Comments"];
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
		  <input type="hidden" value="<?php $value->getUser(); ?>"name="userComment">
		</form></div>

		<i> <h4><?php  echo  $value->getUser(); ?> </h4>
		  <?php  echo  $value->getComment(); ?> </i><?php
							    } ?><br>
		<br>
		<form action = "loginUser.php">
		  <h4> Login to add a comment! </h4>
		  <input type ="submit" value = "Login">
		</form>
		<form action = "registerUser.php">
		  <h4> New user? Register an account!</h4>
		  <input type ="submit" value = "Register">
		</form>
	    </div>
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
