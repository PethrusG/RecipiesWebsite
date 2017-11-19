<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> Register new user </title>
</head>
<body>

  <form action="commentID.php" method="get">
    <input type="text" name="comment" value="Låt höra!">
    <input type="submit" name="submitComment" value="Lägg in kommentar">
    <input type="hidden" value="<?php echo time(); ?>" name="timestamp">

</body>
</html>
