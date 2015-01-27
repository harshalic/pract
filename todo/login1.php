<!DOCTYPE html>
<html>
<body>

<?php
$con=  mysql_connect("localhost","root","");

$sql="CREATE DATABASE todo";
mysql_query($sql,$con);
mysql_select_db("todo");
$sql1="CREATE TABLE Persons(FirstName CHAR(30),LastName CHAR(30),Age INT)";
mysql_query($sql1,$con);
?>
  
</body>
</html>