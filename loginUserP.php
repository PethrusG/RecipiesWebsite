<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/styleFeatured.css">
  <title> Register new user </title>
</head>
<body>
  <form action="loginUserDB.php" method="post">
    User name:
    <input type="text" name="userName"><br>
    Password:
    <input type="text" name="password"><br>
    <input type="submit" name="submitNewUser" value="Login">
  </form>
  <form action="recipePancakesDynamicLoggedOut.php" method="post">
     <input type="submit" name="back" value="Back to recipe">
  </form>

</body>
</html>


