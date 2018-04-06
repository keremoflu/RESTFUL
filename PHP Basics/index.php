<?php

  include_once 'database.php'

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Title</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

  $sql = "SELECT * FROM users;";
  $result = mysqli_query($connection, $sql);
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck>0){
    //mysqli_fetch_assoc : her satırı tüm değişkenleri ile array olarak çıkarır.
    while($row = mysqli_fetch_assoc($result)){
      echo $row['user_uid']."<br>";
    }

  }else{
    echo "database is empty!";
  }


?>

</body>
</html>
