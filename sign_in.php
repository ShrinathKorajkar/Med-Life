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
  <link rel="stylesheet" href="assets/stylesheet.css" />

  <title>Med Life</title>
</head>

<body class="bg-warning bg-opacity-10 sign_in">

  </div>
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
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">help</a>
              </li>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <main style="overflow: scroll;">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $showAlert = false;

      include 'dbconnect.php';
      $name = $_POST["name"];
      $aadhaar = $_POST["aadhaar"];
      $age = $_POST["age"];
      $bloodgroup = $_POST["bloodgroup"];
      $birthdayDate = $_POST["birthdayDate"];
      $gender = $_POST["gender"];
      $phoneNumber = $_POST["phoneNumber"];
      $emergency = $_POST["emergency"];


      // $sql1 = "INSERT INTO `user` (`AADHAR_NO`, `USERNAME`) VALUES ('$aadhaar', '$name');";
      $sql = "INSERT INTO `p_details` (`AADHAR_NO`, `AGE`, `BLOOD_GRP`, `DOB`, `CONTACT_NO`, `ECONTACT_NO`, `GENDER`) VALUES ('$aadhaar', '$age', '$bloodgroup', '$birthdayDate', '$phoneNumber', '$emergency', '$gender');
          INSERT INTO `user` (`AADHAR_NO`, `USERNAME`) VALUES ('$aadhaar', '$name')";
      $result = mysqli_query($conn, $sql);
      // $result1 = mysqli_query($conn, $sql1);
      if ($result1) {
        $showAlert = true;
      }
      if ($showAlert) {
        echo ' <div class="alert alert-Success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Regestered Successfully
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div> ';
      } else {
        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Registration Failed Try Once Again
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div> ';
      }
    }
    ?>
    <section class="vh-100 ">
      <div class="container col-10 py-5 h-90">
        <div class="row  justify-content-center align-items-center h-90">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 text-decoration-underline">
                <center> Registration Form</center>
              </h2>
              <h5 class="mb-4 pb-2 pb-md-0 mb-md-5">Enter Your Details</h5>
              <form action="/dbms_miniproject/sign_in.php" method="post">

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="text" id="name" name="name" required class="form-control form-control-lg" />
                      <label class="form-label" for="name">Name</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="tel" id="aadhaar" name="aadhaar" required class="form-control form-control-lg" maxlength="12" minlength="12" />
                      <label class="form-label" for="aadhaar">Aadhaar no</label>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="number" id="age" name="age" min="1" max="150" required class="form-control form-control-lg" />
                      <label class="form-label" for="age">Age</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <select class="form-select form-select-lg" id="bloodgroup" name="bloodgroup" aria-label=".form-select-lg example">
                        <option selected>
                          <h6 class="fs-6"> Select</h6>
                        </option>
                        <option value="A +ve">A +ve</option>
                        <option value="A -ve">A -ve</option>
                        <option value="B +ve">B +ve</option>
                        <option value="B -ve">B -ve</option>>
                        <option value="AB +ve">AB +ve</option>
                        <option value="AB -ve">AB -ve</option>>
                        <option value="O +ve">O +ve</option>
                        <option value="O -ve">O -ve</option>
                      </select>
                      <label class="form-label" for="bloodgroup">Blood Group</label>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">
                    <div class="form-outline datepicker w-100">
                      <input type="date" class="form-control form-control-lg" id="birthdayDate" name="birthdayDate" required />
                      <label for="birthdayDate" class="form-label">Date of Birth</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <h6 class="mb-2 pb-1">Gender: </h6>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" checked required />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" required />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="otherGender" value="other" required />
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                      <input type="tel" id="phoneNumber" name="phoneNumber" required class="form-control form-control-lg" />
                      <label class="form-label" for="phoneNumber">Phone Number</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                      <input type="tel" id="emergency" name="emergency" required class="form-control form-control-lg" />
                      <label class="form-label" for="emergency">Emergency Phone no</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center m-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" name="form2Example3c" required />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-block  px-5 text-body" style="background-color:rgba(0, 0, 255, 0.507) ">Register</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script async src="assets/script.js"></script>

</html>