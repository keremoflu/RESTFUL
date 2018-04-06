<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

  $dayofweek = date("w");
  echo $dayofweek;

  switch ($dayofweek) {
    case 0:
          echo "Monday";
      break;

    case 1:
          echo "Tuesday";
          break;


    default:
      # code...
      break;
  }

?>




</body>
</html>
