<?php

$x = 10;

function printData(){
  //Reaching variable from local
  echo $GLOBALS['x'];

  //Here is wrong statement example
  echo $x; //error occurs
}

printData();

?>
