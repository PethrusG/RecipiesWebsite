<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parameters</title>
    </head>
    <body>
      <h1> Get username and password: </h1>
<?php
foreach ($_GET as $key => $value) {
  echo "$key: $value<br>";
}
 ?>
 </body>
 </html>
