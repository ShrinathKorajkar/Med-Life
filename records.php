<?php
// session_start
session_start();
include "dbconnect.php";
$page = "MED_HISTORY";
include "loginheader.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (isset($_POST['snoEdit'])) {
    // Update the record
    $sno = $_POST["snoEdit"];
    $SdateEdit = $_POST["SdateEdit"];
    $EdateEdit = $_POST["EdateEdit"];
    $SympEdit = $_POST["SympEdit"];
    $DiseaseEdit = $_POST["DiseaseEdit"];
    $MedEdit = $_POST["MedEdit"];

    $statEdit = $_POST["statEdit"];

    // Sql query to be executed
    $sql = "UPDATE `MED_HISTORY` SET `S_DATE` = '$SdateEdit', `E_DATE` = '$EdateEdit', `SYMPTOMS` = ' $SympEdit', `DISEASE` = '$DiseaseEdit', `MEDICATION` = '$MedEdit', `DOC_NAME` = '$docname', `STAT` = '$statEdit' WHERE `SNO` = '$sno';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
    } else {
      $error = true;
    }
  } else {

    $S_DATE = $_POST["Start-date"];
    $E_DATE = $_POST["End-date"];
    $SYMPTOMS = $_POST["Symptoms"];
    $DISEASE = $_POST["Disease"];
    $MEDICATION = $_POST["Medication"];
    $STAT = $_POST["status"];

    $sql = "INSERT INTO `MED_HISTORY` (`AADHAR_NO`,`S_DATE`, `E_DATE`, `SYMPTOMS`, `DISEASE`, `MEDICATION`, `DOC_NAME`, `STAT`) VALUES ('$aadhar_no','$S_DATE', '$E_DATE', '$SYMPTOMS', '$DISEASE', '$MEDICATION', '$docname', '$STAT');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $showAlert = true;
    } else {
      $error = true;
    }
  }
}
include "header.php";
?>

<main class="records">
  <section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl  modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
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
                <select class="form-select" id="statEdit" name="statEdit" required>
                  <option value="Active" selected>Active</option>
                  <option value="Cured">Cured</option>
                </select>
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
  <section class="container">

    <?php
    include 'errormsg.php';

    if ($doclog) {
      echo '<div class="container-fluid mt-3 mb-5">
                 
                          <h5 class="card-text">Add New entry</h5>
                          <form action="/dbms_miniproject/records.php" method="POST">
                            <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                              <label class="col visually-hidden" for="add-column">Start-date</label>
                              <input type="text" class="form-control" id="add-column" name="Start-date" placeholder="Start-date" onfocus=(this.type="date") onblur=(this.type="text") required>
                              <label class="col visually-hidden" for="add-column">End-date</label>
                              <input type="text" class="form-control" id="Edate" name="End-date" placeholder="End-date" onfocus=(this.type="date") onblur=(this.type="text")>
                              <label class="col visually-hidden" for="add-column">Symptoms</label>
                              <input type="text" class="form-control" id="add-column" name="Symptoms" placeholder="Symptoms" required>
                              <label class="col visually-hidden" for="add-column">Disease</label>
                              <input type="text" class="form-control" id="add-column" name="Disease" placeholder="Disease" required>
                              <label class="col visually-hidden" for="add-column">Medication</label>
                              <input type="text" class="form-control" id="add-column" name="Medication" placeholder="Medication" required>
                              <select class="form-select" id="status" name="status" required>
                                <option value="Active" selected>Active</option>
                                <option value="Cured">Cured</option>
                              </select>
                              <button type="submit" class="btn col btn-primary">ADD</button>
                            </div>
                          </form>
                        </div>';
    }
    ?>
    <table class="table table-dark table-hover table-striped" id="myTable1">
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
        $sql = "SELECT * FROM `MED_HISTORY` WHERE `AADHAR_NO` = '$aadhar_no'";
        $result3 = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result3)) {
          $sno = $sno + 1;
          echo "<tr>
                          <th scope='row'>" .  $sno . "</th>
                          <td>" . $row['S_DATE'] . " </td>";
          if ($row['E_DATE'] == '0000-00-00') {
            echo "<td>Active</td>";
          } else {
            echo "<td>" . $row['E_DATE'] . "</td>";
          }
          echo "<td>" . $row['SYMPTOMS'] . "</td>
                          <td>" . $row['DISEASE'] . "</td>
                          <td>" . $row['MEDICATION'] . "</td>
                          <td>" . $row['DOC_NAME'] . "</td>
                          <td>" . $row['STAT'] . "</td>";
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
                <th scope="col">Daily meds</th>
                <th scope="col">Allergies</th>
                <th scope="col">PREVIOUS INJURY</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sno = 0;
              $sql = "SELECT * FROM `OTHER_MED` WHERE `AADHAR_NO` = '$aadhar_no'";
              $result2 = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result2)) {

                echo "<tr>";
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

                $sno = 0;
                $sql = "SELECT * FROM `P_details` WHERE `AADHAR_NO` = '$aadhar_no'";
                $result1 = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result1)) {
                  echo "<tr>
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
    <div class="container row justify-content-end mb-4">
      <?php
      if ($doclog) {
        echo '<a class="btn btn-success col col-2" href="diagnosis.php" role="button">Diagnose</a>';
      }
      ?>
    </div>
    </div>
  </section>
</main>

<script>
  $(document).ready(function() {
    $('#myTable1').DataTable();

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
      stat = tr.getElementsByTagName("td")[6].innerText;
      console.log(sdate, edate, symptoms, disease, medication, stat);
      SdateEdit.value = sdate;
      EdateEdit.value = edate;
      SympEdit.value = symptoms;
      DiseaseEdit.value = disease;
      MedEdit.value = medication;
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

<?php
include 'footer.php';
?>