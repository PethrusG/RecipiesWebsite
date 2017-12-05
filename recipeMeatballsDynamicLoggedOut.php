
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
		<a href="recipePancakesDynamicLoggedOut.php">Pancakes</a>
	      </li>
	      <li class="current">
		<a href="recipeMeatballsDynamicLoggedOut.php">Meatballs</a>
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
	      </div>

	      <?php
	      include_once 'classes/Model/Comment.php';
	      include_once 'classes/Controller/Controller.php';
	      include_once 'classes/Util/Util.php';
	      include_once 'classes/Controller/SessionManager.php';

	      Util::initRequest();
	      $controller = SessionManager::getController();
	      $comments = $controller->retrieveComments();

	      // Display comments with user to the browser
	      foreach ($comments as $value){ ?>
		<div> <form class ="comments" action="deleteComment.php">
		  <input type="hidden" value="<?php $value->getTimestamp();
					      ?>"
			 name="timestamp">
		  <input type="hidden" value="<?php $value->getUser();
					      ?>"name="userComment">
		</form></div>

		<i> <h4><?php  echo  $value->getUser(); ?> </h4>
		  <?php  echo  $value->getComment(); ?> </i><?php
							    }
		SessionManager::storeController($controller);					   
							   ?><br>
							    } ?><br>
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
    <div class="footer">
      <div>
	<p>
	  &copy; Copyright 2012. All rights reserved
	</p>
      </div>
    </div>
  </body>
</html>
