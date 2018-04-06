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

<form method="POST">
  <input type="text" name="name" placeholder="Name"><br>
  <input type="text" name="lastname" placeholder="Surname"><br>
  <input type="text" name="email" placeholder="E-mail"><br>
  <input type="text" name="uid" placeholder="Username"><br>
  <input type="text" name="password" placeholder="Password"><br>
  <button type="submit" name="submit">Sign Up</button>

  <?php

      if(isset($_POST['submit'])){
        $user_name = mysqli_real_escape_string($connection, $_POST['name']);
        $user_lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        $user_email = mysqli_real_escape_string($connection, $_POST['email']);
        $user_uid = mysqli_real_escape_string($connection, $_POST['uid']);
        $user_password = mysqli_real_escape_string($connection, md5($_POST['password']));

        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_password) VALUES ('$user_name', '$user_lastname', '$user_email', '$user_uid', '$user_password');";
        mysqli_query($connection, $sql);
      ?>
  <?php } ?>


</body>
</html>
