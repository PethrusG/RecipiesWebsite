<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Swedish Meatballs</title>

</head>
<body>

	<form action="php/commentID.php" method="get">
	Write yout comment:
	  <input type="text" name="textruta" value="Låt höra!">
	  <input type="submit" name="submitComment" value="Submit comment">
	  <?php $timestamp = date(); echo $timestamp?>
	  <input type="hidden" value="<?php echo "$timestamp";?>" name="timestamp">

  </body>
</html>
