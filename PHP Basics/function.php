<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>Deneme Title</title>
</head>

<body>


<?php
//function without parameter
function functionWithoutParameter(){
  echo "There are 7 different days in a week"."<br>";
}
functionWithoutParameter();

//function with parameter
$x = 100;
function functionWithParameter($variable){
  $calculation = $variable * 0.5;
  echo "Half of ".$variable." is ".$calculation;
}
functionWithParameter($x);
?>

</body>
</html>
