

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <?php
  if(isset($_POST['name'])){
    echo $_POST['name'];
  }
  ?>

<form method="POST">
  <input type="text" name="name"><br><br>
  <button type="submit">PRESS ME!</button>
</form>

</body>
</html>
