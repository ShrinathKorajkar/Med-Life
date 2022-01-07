<?php
// connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "medlifedb";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn){
  die("Error connecting". mysqli_connect_error());
}
?>
