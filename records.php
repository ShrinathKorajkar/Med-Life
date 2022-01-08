<?php
$update = false;
include 'dbconnect.php';
if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `MED_HISTORY` WHERE `SNO` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $showAlert = false;

  if (isset($_POST['snoEdit'])) {
    // Update the record
    $sno = $_POST["snoEdit"];
    $SdateEdit = $_POST["SdateEdit"];
    if (isset($_POST["EdateEdit"])) {
      $EdateEdit = $_POST["EdateEdit"];
    } else {
      $EdateEdit = NULL;
    }
    $SympEdit = $_POST["SympEdit"];
    $DiseaseEdit = $_POST["DiseaseEdit"];
    $MedEdit = $_POST["MedEdit"];
    $DocnmEdit = $_POST["DocnmEdit"];
    $statEdit = $_POST["statEdit"];

    // Sql query to be executed
    $sql = "UPDATE `MED_HISTORY` SET `S_DATE` = '$SdateEdit', `E_DATE` = '$EdateEdit', `SYMPTOMS` = ' $SympEdit', `DISEASE` = '$DiseaseEdit', `MEDICATION` = '$MedEdit', `DOC_NAME` = '$DocnmEdit', `STAT` = '$statEdit' WHERE `SNO` = '$sno';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
    } else {
      echo "We could not update the record successfully";
    }
  } else {
    $S_DATE = $_POST["Start-date"];
    if (isset($_POST["End-date"])) {
      $E_DATE = $_POST["End-date"];
    } else {
      $E_DATE = NULL;
    }
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
    <!-- <section>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="/crud/index.php" method="POST">
              <div class="modal-body">
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="form-group">
                  <label for="title">Note Title</label>
                  <input type="text" class="form-control" id="" name="" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                  <label for="desc">Note Description</label>
                  <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
                </div>
              </div>
              <div class="modal-footer d-block mr-auto">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section> -->
    <section>
      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl  modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/dbms_miniproject/records.php" method="post">
              <div class="modal-body">
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="row input-group row-cols-auto border border-2 border-dark align-items-center my-3">
                  <label class="col visually-hidden" for="SdateEdit">Start-date</label>
                  <input type="text" class="form-control" id="SdateEdit" name="SdateEdit" placeholder="Start-date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                  <label class="col visually-hidden" for="EdateEdit">End-date</label>
                  <input type="text" class="form-control" id="EdateEdit" name="EdateEdit" placeholder="End-date" onfocus="(this.type='date')" onblur="(this.type='text')">
                  <label class="col visually-hidden" for="SympEdit">Symptoms</label>
                  <input type="text" class="form-control" id="SympEdit" name="SympEdit" placeholder="Symptoms" required>
                  <label class="col visually-hidden" for="DiseaseEdit">Disease</label>
                  <input type="text" class="form-control" id="DiseaseEdit" name="DiseaseEdit" placeholder="Disease" required>
                </div>
                <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                  <label class="col visually-hidden" for="MedEdit">Medication</label>
                  <input type="text" class="form-control" id="MedEdit" name="MedEdit" placeholder="Medication" required>
                  <label class="col visually-hidden" for="DocnmEdit">Doc-name</label>
                  <input type="text" class="form-control" id="DocnmEdit" name="DocnmEdit" placeholder="Doc-name" required>
                  <select class="form-select" id="statEdit" name="statEdit" required>
                    <option value="Active" selected>Active</option>
                    <option value="Cured">Cured</option>
                  </select>
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
            <div class="card-title col">AADHAR NO :</div>
            <div class="card-title col">NAME :</div>
          </div>
          <div class="accordion accordion-flush" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h5 class="card-title">MEDICAL HISTORY</h5>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body ">
                  <div class="container-fluid mt-3 mb-5">
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
                  <table class="table table-dark table-hover table-striped" id="myTable3">
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
                        <th scope="col">Edit</th>
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
                          <th scope='row'>" .  $row['S_DATE'] . "</th>
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
                          <td> <span class='btn-group'><button type='button' class='edit btn btn-sm btn-primary' id=" . $row['SNO'] . ">Edit</button> <button class='delete btn btn-sm btn-danger' id=d" . $row['SNO'] . ">Delete</button>  </td></span>
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
                <div class="accordion-body my-4">
                  <table class="table table-dark table-hover table-striped" id="myTable2">
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
                    <h5 class="card-title">PERSONAL DETAILS</h5>
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <table class="table table-dark table-hover table-striped" id="myTable1">
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
            </div>
          </div>
        </div>
    </section>
  </main>
</body>
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
      sdate = tr.getElementsByTagName("td")[0].innerText;
      edate = tr.getElementsByTagName("td")[1].innerText;
      symptoms = tr.getElementsByTagName("td")[2].innerText;
      disease = tr.getElementsByTagName("td")[3].innerText;
      medication = tr.getElementsByTagName("td")[4].innerText;
      docname = tr.getElementsByTagName("td")[5].innerText;
      stat = tr.getElementsByTagName("td")[6].innerText;
      console.log(sdate, edate, symptoms, disease, medication, docname, stat);
      SdateEdit.value = sdate;
      EdateEdit.value = edate;
      SympEdit.value = symptoms;
      DiseaseEdit.value = disease;
      MedEdit.value = medication;
      DocnmEdit.value = docname;
      statEdit.value = stat;
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
        window.location = `/dbms_miniproject/records.php?delete=${sno}`;
        // TODO: Create a form and use post request to submit a form
      } else {
        console.log("no");
      }
    })
  })
</script>

</html>