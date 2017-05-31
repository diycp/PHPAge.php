<?php
 require_once 'PHPAge.php';
 
 $age=new Age('./test.jpg');//Pictures of faces
 $result=$age->age();
 echo "<img src='./test.jpg' width=300px height=400px />";
 echo "<br/>age:".$result;

?>