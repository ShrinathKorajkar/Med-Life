<?php
$update = false;
$showAlert = false;
$delete = false;
$error = false;
$doclog = false;
$userlog = false;
$aadhar_no = NULL;
$docname = NULL;

if (isset($_SESSION['doclog'])) {
  $doclog = true;
  $docname = $_SESSION['docname'];
}

if (isset($_SESSION['userlog'])) {
  $userlog = true;
  $aadhar_no = $_SESSION['aadhar_no'];
  $sql = "Select `username` from `user` where `aadhar_no`='$aadhar_no'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
} else {
  header("location: index.php");
}

if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `$page` WHERE `SNO` = $sno";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $delete = true;
  }
}
