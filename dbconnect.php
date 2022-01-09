<?php
// connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "medlifedb";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Check Your Connection
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
  exit();
}
