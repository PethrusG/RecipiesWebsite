<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/styleFeatured.css">
  <title> Register new user </title>
</head>
<body>
  <form action="registerUserDB.php" method="post">
    User name:
    <input type="text" name="newUserName"><br>
    Password:
    <input type="text" name="newPassword"><br>
    Confirm password:
    <input type="text" name="confirmPassword"><br>
    <input type="submit" name="submitNewUser" value="Submit New User">
  </form>
  <form action="recipePancakesDynamicLoggedOut.php">
     <input type="submit" name="back" value="Back">
  </form>

</body>
</html>


