<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $showAlert = false;
  // session_start();

  include 'dbconnect.php';
  $S_DATE = $_POST["Start-date"];
  $E_DATE = $_POST["End-date"];
  $SYMPTOMS = $_POST["Symptoms"];
  $DISEASE = $_POST["Disease"];
  $MEDICATION = $_POST["Medication"];
  $DOC_NAME = $_POST["Doc-name"];
  $STAT = $_POST["status"];


  $sql = "INSERT INTO `MED_HISTORY` (`S_DATE`, `E_DATE`, `SYMPTOMS`, `DISEASE`, `MEDICATION`, `DOC_NAME`, `STAT`) VALUES ('$S_DATE', '$E_DATE', '$SYMPTOMS', '$DISEASE', '$MEDICATION', '$DOC_NAME', '$STAT');";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $showAlert = true;
  }
}
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
  <link rel="stylesheet" href="assets/stylesheet.css" />

  <title>Med Life</title>

  <style>
    input[type=date]::-webkit-datetime-edit-year-field:not([aria-valuenow]),
    input[type=date]::-webkit-datetime-edit-month-field:not([aria-valuenow]),
    input[type=date]::-webkit-datetime-edit-day-field:not([aria-valuenow]) {
      color: transparent;
    }
  </style>
</head>

<body class="bg-warning bg-opacity-10 records">
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
    <section class="container overflow-scroll">
      <div class="container-fluid  lh-lg  text-center text-success m-auto text-decoration-underline"></div>
      <div class="card">
        <div class="card-header fw-bold h1 fw-bold text-center text-success  text-decoration-underline bg-warning bg-gradient bg-opacity-50">
          PATIENT RECORDS
        </div>
        
         <div class="card-body">
          <div class="row my-3">
            <?php
              include "dbconnect.php"; 
            
             session_start();
             $aadhar_no = $_SESSION['aadhaar_no'];
            //  $get = "Select username from user where aadhar_no='$aadhar_no'";
            //  $que = mysqli_query($conn, $get);
            //  $user = mysqli_fetch_object($que, 'username');
            echo "<div class='card-title col'>AADHAR NO : $aadhar_no </div>
            <div class='card-title col'>NAME :</div>";
            ?>
          </div>
          <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h5 class="card-title">PERSONAL DETAILS</h5>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table table-dark table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Age</th>
                        <th scope="col">Blood type</th>
                        <th scope="col">D.O.B</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone-no</th>
                        <th scope="col">Emergency-no</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include 'dbconnect.php';
                      // session_start();
                      // $aadhar_no = $_SESSION['aadhaar_no'];
                      $sno = 0;
                      $sql = "SELECT * FROM `P_details`";
                      $result1 = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result1)) {
                        $sno = $sno + 1;
                        echo "<tr>
                          <th scope='row'>" . $sno . "</th>
                          <td>" . $row['AGE'] . " </td>
                          <td>" . $row['BLOOD_GRP'] . "</td>
                          <td>" . $row['DOB'] . "</td>
                          <td>" . $row['GENDER'] . "</td>
                          <td>" . $row['CONTACT_NO'] . "</td>
                          <td>" . $row['ECONTACT_NO'] . "</td>
                        </tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h5 class="card-title">INJURY, ALLERGIES, AND DAILY MEDS</h5>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table table-dark table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Daily meds</th>
                        <th scope="col">Allergies</th>
                        <th scope="col">PREVIOUS INJURY</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include 'dbconnect.php';
                      $sno = 0;
                      $sql = "SELECT * FROM `OTHER_MED`";
                      $result2 = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result2)) {
                        $sno = $sno + 1;
                        echo "<tr>";
                        echo "<th scope='row'>" . $sno . "</th>";
                        if ($row['MEDS'] == NULL) {
                          echo "<td>NONE</td>";
                        } else {
                          echo "<td>" . $row['MEDS'] . "</td>";
                        }
                        if ($row['ALLERGIES'] == NULL) {
                          echo "<td>NONE</td>";
                        } else {
                          echo "<td>" . $row['ALLERGIES'] . "</td>";
                        }
                        if ($row['INJURY'] == NULL) {
                          echo "<td>NONE</td>";
                        } else {
                          echo "<td>" . $row['INJURY'] . " </td>";
                        }
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h5 class="card-title">MEDICAL HISTORY</h5>
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="container-fluid my-3">
                      <h5 class="card-text">Add New entry</h5>
                      <form action="/dbms_miniproject/records.php" method="POST">
                        <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                          <label class="col visually-hidden" for="add-column">Start-date</label>
                          <input type="text" class="form-control" id="add-column" name="Start-date" placeholder="Start-date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                          <label class="col visually-hidden" for="add-column">End-date</label>
                          <input type="text" class="form-control" id="add-column" name="End-date" placeholder="End-date" onfocus="(this.type='date')" onblur="(this.type='text')">
                          <label class="col visually-hidden" for="add-column">Symptoms</label>
                          <input type="text" class="form-control" id="add-column" name="Symptoms" placeholder="Symptoms" required>
                          <label class="col visually-hidden" for="add-column">Disease</label>
                          <input type="text" class="form-control" id="add-column" name="Disease" placeholder="Disease" required>
                          <label class="col visually-hidden" for="add-column">Medication</label>
                          <input type="text" class="form-control" id="add-column" name="Medication" placeholder="Medication" required>
                          <label class="col visually-hidden" for="add-column">Doc-name</label>
                          <input type="text" class="form-control" id="add-column" name="Doc-name" placeholder="Doc-name" required>
                          <select class="form-select" id="status" name="status" required>
                            <option value="Active" selected>Active</option>
                            <option value="Cured">Cured</option>
                          </select>
                          <button type="submit" class="btn col btn-primary">ADD</button>
                        </div>
                      </form>
                    </div>
                    <table class="table table-dark table-hover table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Sno</th>
                          <th scope="col">Start-date</th>
                          <th scope="col">End-date</th>
                          <th scope="col">Symptoms</th>
                          <th scope="col">Disease</th>
                          <th scope="col">Medication</th>
                          <th scope="col">Doc-name</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include 'dbconnect.php';
                        $sno = 0;
                        $sql = "SELECT * FROM `MED_HISTORY`";
                        $result3 = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result3)) {
                          $sno = $sno + 1;
                          echo "<tr>
                          <th scope='row'>" . $sno . "</th>
                          <td>" . $row['S_DATE'] . " </td>";
                          if ($row['E_DATE'] == NULL) {
                            echo "<td>Active</td>";
                          } else {
                            echo "<td>" . $row['E_DATE'] . "</td>";
                          }
                          echo "<td>" . $row['SYMPTOMS'] . "</td>
                          <td>" . $row['DISEASE'] . "</td>
                          <td>" . $row['MEDICATION'] . "</td>
                          <td>" . $row['DOC_NAME'] . "</td>
                          <td>" . $row['STAT'] . "</td>
                        </tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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