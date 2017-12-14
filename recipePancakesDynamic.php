<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Swedish Pancakes</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/styleFeatured.css">
    <script type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type ="text/javascript" src="recipes.js" ></script>
  </head>
  <body>
    <div class="header">
      <div>
        <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
      </div>
    </div>
    <div class="body">
      <div>
        <div class="header">
          <ul>
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="calendar.php"> Calendar</a>
            <li>
            <li class="current">
              <a href="recipePancakesDynamic.php">Pancakes</a>
            </li>
            <li>
              <a href="recipeMeatballsDynamic.php">Meatballs</a>
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
                        
	      <div id ="commentList" >
	      </div>
              <?php
	    include_once 'classes/Util/Util.php';
	    Util::initRequest();
	      ?>
	      <textarea id="comment" name="commentName" placeholder="Your comment" >
	      </textarea>
	      <button id="submitComment">Submit Comment</button>
              <br>
              <!-- <form  action = "addCommentP.php" method="post">
                   <input type = "text" name="comment" value = "Add your comment here">  
                   <input type ="submit" value ="Submit comment">
		   </form> -->
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
