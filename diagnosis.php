<?php
// session_start();
session_start();
$ano = $_SESSION['aadhar_no'];
include "dbconnect.php";
$update = false;
$showAlert = false;
$delete = false;
$error = false;
$doclog = false;
$userlog = false;
$aadhar_no = $_SESSION['aadhar_no'];
$docname = null;
if (isset($_SESSION['doclog'])) {
  $doclog = true;
  $docname = $_SESSION['docname'];
}

if (isset($_SESSION['userlog'])) {
  $userlog = true;
  $sql = "Select `username` from `user` where `aadhar_no`='$aadhar_no'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
} else {
  echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SORRY!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <p>you are not logged in </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>';
  header("location: index.php");
}


if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `DIAGNOSE` WHERE `SNO` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (isset($_POST['snoEdit'])) {
    // Update the record
    $sno = $_POST["snoEdit"];
    $TdateEdit = $_POST["TdateEdit"];
    // if (isset($_POST["EdateEdit"])) {
      $AppeEdit = $_POST["AppeEdit"];
    // } else {
    //   $EdateEdit = NULL;
    // }
    $BpEdit = $_POST["BpEdit"];
    $MassEdit = $_POST["MassEdit"];
    $TempEdit = $_POST["TempEdit"];

    $PulseEdit = $_POST["PulseEdit"];
    $RemarksEdit = $_POST["RemarksEdit"];
    $MedicationEdit = $_POST["MedicationEdit"];

    // Sql query to be executed
    $sql = "UPDATE `DIAGNOSE` SET `T_DATE` = '$TdateEdit', `APPEAREANCE` = '$AppeEdit', `BP` = ' $BpEdit', `MASS` = '$MassEdit', `TEMP` = '$TempEdit', `PULSE` = '$PulseEdit', `REMARKS` = '$RemarksEdit', `MEDICATION` = '$MedicationEdit' WHERE `SNO` = '$sno';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
    } else {
      $error = true;
    }
  } else {

    $T_DATE = $_POST["T_date"];
    $APPEAREANCE = $_POST["Appeareance"];
    $BP = $_POST["BP"];
    // } else {
    //   $E_DATE = ' NULL';
    
    $MASS = $_POST["Mass"];
    $TEMP = $_POST["Temp"];
    $PULSE = $_POST["Pulse"];
    $REMARKS = $_POST["Remarks"];
    $MEDICATION = $_POST["Medication"];

    $sql = "INSERT INTO `DIAGNOSE` (`AADHAR_NO`,`T_DATE`, `APPEAREANCE`, `BP`, `MASS`, `TEMP`, `PULSE`, `REMARKS`, `MEDICATION`) VALUES ('$aadhar_no','$T_DATE', '$APPEAREANCE', '$BP', '$MASS', '$TEMP', '$PULSE', '$REMARKS', '$MEDICATION');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $showAlert = true;
    } else {
      $error = true;
    }
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
    <section>
      <?php
      if ($update) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Records Updated
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
      }
      if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Records Inserted successfully
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
      }
      if ($delete) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Records Deleted successfully
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
      }
      if ($error) {
        echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">SORRY!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>Error occured while Processing Your request</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>';
      }

      ?>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl  modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/dbms_miniproject/diagnosis.php" method="post">
              <div class="modal-body">
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="row input-group row-cols-auto border border-2 border-dark align-items-center my-3">
                  <label class="col visually-hidden" for="TdateEdit">T_date</label>
                  <input type="text" class="form-control" id="TdateEdit" name="TdateEdit" placeholder="T_date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                  <label class="col visually-hidden" for="AppeEdit">Appeareance-date</label>
                  <input type="text" class="form-control" id="EdateEdit" name="AppeEdit" placeholder="Appeareance" required>
                  <label class="col visually-hidden" for="BpEdit">BP</label>
                  <input type="text" class="form-control" id="SympEdit" name="BpEdit" placeholder="Bp" required>
                  <label class="col visually-hidden" for="MassEdit">Mass</label>
                  <input type="text" class="form-control" id="DiseaseEdit" name="MassEdit" placeholder="Mass" required>
                </div>
                <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                  <label class="col visually-hidden" for="TempEdit">Temperature</label>
                  <input type="text" class="form-control" id="MedEdit" name="TempEdit" placeholder="Temperature" required>
                  <!-- <select class="form-select" id="statEdit" name="statEdit" required>
                    <option value="Active" selected>Active</option>
                    <option value="Cured">Cured</option>
                  </select> -->
                  <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                  <label class="col visually-hidden" for="PulseEdit">Pulse</label>
                  <input type="text" class="form-control" id="MedEdit" name="PulseEdit" placeholder="Medication" required>
                  <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                  <label class="col visually-hidden" for="RemarksEdit">Remarks</label>
                  <input type="text" class="form-control" id="MedEdit" name="RemarksEdit" placeholder="Medication" required>
                  <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                  <label class="col visually-hidden" for="MedicationEdit">Medication</label>
                  <input type="text" class="form-control" id="MedEdit" name="MedicationEdit" placeholder="Medication" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
    <section class="container overflow-scroll">
      <div class="container-fluid  lh-lg  text-center text-success m-auto text-decoration-underline"></div>
      <div class="card">
        <div class="card-header fw-bold h1 fw-bold text-center text-success  text-decoration-underline bg-warning bg-gradient bg-opacity-50">
          PATIENT RECORDS
        </div>

        <div class="card-body">
          <div class="row my-3 mx-2">
            <?php

            echo "<div class='card-title col h4'>AADHAR NO : " . $aadhar_no . "</div>
                  <div class='card-title col h4'>NAME : " . $username . "</div>";
            if ($userlog) {
              $_SESSION["onlyuser"] = true;
              echo "<a class='btn btn-primary card-title col-2' href='logoutuser.php' role='button'>User logout</a>";
            }
            if ($doclog) {
              $_SESSION["onlyuser"] = false;
              echo "<a class='btn btn-primary card-title col col-2' href='logoutdoc.php' role='button'>Doc logout</a>";
            }

            ?>
          </div>
          <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h5 class="card-title">DIAGNOSIS</h5>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body ">
                  <?php

                  if ($doclog) {
                    echo '<div class="container-fluid mt-3 mb-5">
                 
                          <h5 class="card-text">Add New entry</h5>
                          <form action="/dbms_miniproject/diagnosis.php" method="POST">
                            <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                              <label class="col visually-hidden" for="add-column">T_date</label>
                              <input type="text" class="form-control" id="add-column" name="T_date" placeholder="T_date" onfocus=(this.type="date") onblur=(this.type="text") required>
                              <label class="col visually-hidden" for="add-column">Appeareance</label>
                              <input type="text" class="form-control" id="add-column" name="Appeareance" placeholder="Appeareance" required>
                              <label class="col visually-hidden" for="add-column">BP</label>
                              <input type="text" class="form-control" id="add-column" name="BP" placeholder="BP" required>
                              <label class="col visually-hidden" for="add-column">Mass</label>
                              <input type="text" class="form-control" id="add-column" name="Mass" placeholder="Mass" required>
                              <label class="col visually-hidden" for="add-column">Temperature</label>
                              <input type="text" class="form-control" id="add-column" name="Temp" placeholder="Temperature" required>
                              <label class="col visually-hidden" for="add-column">Pulse</label>
                              <input type="text" class="form-control" id="add-column" name="Pulse" placeholder="Pulse" required>
                              
                              <label class="col visually-hidden" for="add-column">Remarks</label>
                              <input type="text" class="form-control" id="add-column" name="Remarks" placeholder="Remarks" required>
                              <label class="col visually-hidden" for="add-column">Medication</label>
                              <input type="text" class="form-control" id="add-column" name="Medication" placeholder="Medication" required>
                              <button type="submit" class="btn col btn-primary">ADD</button>
                            </div>
                          </form>
                        </div>';
                  }
                  ?>
                  <table class="table table-dark" id="myTable3">
                    <thead>
                      <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">T_DATE</th>
                        <th scope="col">APPEAREANCE</th>
                        <th scope="col">BP</th>
                        <th scope="col">MASS</th>
                        <th scope="col">TEMP</th>
                        <th scope="col">PULSE</th>
                        <th scope="col">REMARKS</th>
                        <th scope="col">MEDICATION</th>
                        <?php
                        if ($doclog) {
                          echo "<th scope='col'>Edit</th>";
                        }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $sno = 0;
                      $sql = "SELECT * FROM `DIAGNOSE` WHERE `AADHAR_NO` = '$aadhar_no'";
                      $result3 = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_assoc($result3)) {
                        $sno = $sno + 1;
                        echo "<tr>
                          <th scope='row'>" .  $row['SNO'] . "</th>
                          <td>" . $row['T_DATE'] . " </td>
                           <td>" . $row['APPEAREANCE'] . "</td>
                        
                          <td>" . $row['BP'] . "</td>
                          <td>" . $row['MASS'] . "</td>
                          <td>" . $row['TEMP'] . "</td>
                          <td>" . $row['PULSE'] . "</td>
                          <td>" . $row['REMARKS'] . "</td>
                          <td>" . $row['MEDICATION'] . "</td>";
                          
                          
                        if ($doclog) {
                          echo "<td> <span class='btn-group'><button type='button' class='edit btn btn-sm btn-primary' id=" . $row['SNO'] . ">Edit</button> <button class='delete btn btn-sm btn-danger' id=d" . $row['SNO'] . ">Delete</button>  </td></span>";
                        }
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script async src="assets/script.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#myTable1').DataTable();
    $('#myTable2').DataTable();
    $('#myTable3').DataTable();

  });
</script>
<script>
  edits = document.getElementsByClassName('edit');
  Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log("edit ");
      tr = e.target.parentNode.parentNode.parentNode;
      tdate = tr.getElementsByTagName("td")[0].innerText;
      appeareance = tr.getElementsByTagName("td")[1].innerText;
      bp = tr.getElementsByTagName("td")[2].innerText;
      mass = tr.getElementsByTagName("td")[3].innerText;
      temp = tr.getElementsByTagName("td")[4].innerText;
      pulse = tr.getElementsByTagName("td")[5].innerText;

      remarks = tr.getElementsByTagName("td")[6].innerText;
      medication = tr.getElementsByTagName("td")[7].innerText;
      console.log(tdate, appeareance, bp, mass, temp, pulse, remarks, medication);
      TdateEdit.value = tdate;
      AppeEdit.value = appeareance;
      BpEdit.value = bp;
      MassEdit.value = mass;
      TempEdit.value = temp;
      PulseEdit.value = pulse;
      RemarksEdit.value = remarks;

      MedicationEdit.value = medication;
      snoEdit.value = e.target.id;
      console.log(e.target.id)
      $('#exampleModal').modal('toggle');
    })
  })

  deletes = document.getElementsByClassName('delete');
  Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log("edit");
      sno = e.target.id.substr(1);

      if (confirm("Are you sure you want to delete this entry")) {
        console.log("yes");
        window.location = `/dbms_miniproject/diagnosis.php?delete=${sno}`;
        // TODO: Create a form and use post request to submit a form
      } else {
        console.log("no");
      }
    })
  })
</script>


            

</html>