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
        <li>
            <a href="recipePancakesDynamic.php">Pancakes</a>
        </li>
        <li class="current">
            <a href="recipeMeatballsDynamic.php">Meatballs</a>
     </ul>
     </div>
     <div class="body">
     <div id="content">
     <div>
        <div>
            <h3>Meatballs</h3>
            <p>
            </p>
            <a href="index.php"><img
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

        <?php
        include_once 'Comment.php';

        $servername = "localhost";
        $username = "root";
        $password = "MySQLPethrus15";
        $nameDB = "recipies";
        $userTB = "users";
        $commentTB = "commentsObj";

        $currentUser = $_SESSION["user"];
//      echo "CURRENT USER SESSION: " . $currentUser;

        // Make connection to database(DB)
        $conn = new mysqli($servername, $username, $password, $nameDB);

        // Check connection
        if (!$conn) {    
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve all object of type Comment from DB
        $commentsFromDB = $conn->prepare("SELECT comment FROM commentsObj");
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
            <div> <form class ="comments" action="deleteComment.php" method="post">
                <input type="hidden" value="<?php $value->getTimestamp(); ?>"
                       name="timestamp">
                <input type="hidden" value="<?php $value->getUser(); ?>
                             "name="userComment"><?php  
                echo "<i><h4>" . $value->getUser() . " </h4>";
                echo  $value->getComment() . " </i>";
                
                // Delete buttons only to current user's comments
                if ($value->getUser() == $currentUser . NULL) { 
                    echo '<input type="submit" value="Delete" name="delete">';     
                    $_SESSION["userComment"] = $value->getUser();
                    $_SESSION["timestamp"] = $value->getTimestamp();
                } ?>
            </form></div>

           
                                        <?php             } ?><br>

            <br>
            <form  action = "addComment.php" method="post">
                <input type = "text" name="comment" value = "Add your comment here">    
                <input type ="submit" value ="Submit comment"></form>
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
