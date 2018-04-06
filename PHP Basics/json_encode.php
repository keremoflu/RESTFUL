<?php

  include_once 'database.php'

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <?php

  $sql = "SELECT * FROM users";
  $result = mysqli_query($connection, $sql);

  $json_array = array();
  while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
  }

  echo json_encode($json_array, JSON_UNESCAPED_UNICODE);

  //$users = array('1'=>"Kerem Oflu", '2'=>"Mehmet Gür", '3'=>"Ahmet Sayan");
  //echo json_encode($users);
  ?>


</body>
</html>
