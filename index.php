<?php

include 'dbconnect.php';
session_start();
session_unset();
session_destroy();

?>

<!DOCTYPE html>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/stylesheet.css" />

  <title>Med Life</title>
</head>

<body class="bg-warning bg-opacity-10 index">
  <header>
    <div class="container-fluid" style="background-color: white;">
      <img src="images/header.jpeg" class="mx-auto d-block" alt="image header" style="width: 300px; height: 60px; object-fit: fill;"></img>
    </div>
    <div class="sticky-top">
      <nav class="navbar navbar-expand-sm navbar-light bg-secondary bg-gradient">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="sign_in.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="user.php">userlogin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="doctor.php">doctorlogin</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <main class="d-grid p-2" style="overflow: scroll;">
    <section>
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <h2 class="text-center fw-bold text-primary m-0">WELCOME TO MEDLIFE</h2>
          <h6 class="text-center fw-bold text-danger m-0"> YOUR PERSONAL MEDICAL DATABASE</h6>
          <div class="col">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class=" d-flex align-items-center">
                  <div class="card-body p-4 text-black">
                    <div class="d-grid align-self-center col-md-6 gap-4 mx-auto">
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">CHOOSE YOUR OPTION</h5>
                      <a class="btn btn-success btn-lg" role="button" href="user.php">USER</a>
                      <a class="btn btn-info btn-lg" role="button" href="doctor.php">DOCTOR</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer class="text-center text-lg-start bg-dark text-light">
    <section class="d-flex justify-content-center justify-content-between p-4 border-bottom">

      <div class="me-5">
        <span>Get connected with us on social networks:</span>
      </div>
      <section>
        <div class="about_handle">
          <i class="bi bi-youtube">YouTube</i>&ThickSpace;|&ThickSpace;
          <i class="bi bi-instagram">Instagram</i>&ThickSpace;|&ThickSpace;
          <i class="bi-github" role="img" aria-label="GitHub">Github</i>&ThickSpace;|&ThickSpace;
          <i class="bi-twitter">Twitter</i>&ThickSpace;|&ThickSpace;
          <i class="bi-facebook">Facebook</i>&ThickSpace;|&ThickSpace;
        </div>
      </section>

    </section>
    <section>
      <div class="container text-center text-md-start">
        <div class="row">
          <div class="col align-self-center">
            <h4 class="text-uppercase text-center fw-bold ">
              MEDLIFE
            </h4>
            <p class="lead lh-lg text-center">
              Design, Developed, Maintained By <strong>&Tab; SHRINATH KORAJKAR </strong> And <strong> PRATHAMESH CHOUGULE </strong>
            </p>
          </div>
    </section>
    <div class="text-center " style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="#">MEDLIFE.COM</a>
    </div>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script async src="assets/script.js"></script>

</html>