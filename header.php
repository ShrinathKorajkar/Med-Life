<?php
if (!isset($userlog)) {
  $userlog = false;
}
if (!isset($doclog)) {
  $doclog = false;
}
echo '<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/style.css" />

  <title>MyMedicLife</title>

  <style>
    input[type=date]::-webkit-datetime-edit-year-field:not([aria-valuenow]),
    input[type=date]::-webkit-datetime-edit-month-field:not([aria-valuenow]),
    input[type=date]::-webkit-datetime-edit-day-field:not([aria-valuenow]) {
      color: transparent;
    }
  </style>
</head>

<body>
<header>
<div class="container-fluid text-center" style="background-color: white;">
  <img src="images/logo.jpg" class="m-auto" alt="image header" width="100px">
  <span class="fw-bold fs-1 text-secondary">My<span class="text-danger">Medic</span><span class="text-success">Life</span>
  </span></img>
</div>
<div class="sticky-top">
  <nav class="navbar navbar-expand-sm navbar-light bg-secondary bg-gradient">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="sign_in.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="user.php">userlogin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="doctor.php">doctorlogin</a>
          </li>
          </ul>';
if ($userlog) {
  echo ' 
          <span class="navbar-text">
            <a class="nav-link active p-0 my-2 px-sm-3 m-sm-0" aria-current="page" href="logoutuser.php">User logout</a>
          </span>';
}
if ($doclog) {
  echo ' 
          <span class="navbar-text">
            <a class="nav-link active p-0 mt-3 px-sm-3 m-sm-0" aria-current="page" href="logoutdoc.php">Doc logout</a>
          </span>';
}

echo '
      </div>
    </div>
  </nav>
</div>
</header>';
