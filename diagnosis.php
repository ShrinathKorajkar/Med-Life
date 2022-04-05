<?php
// session_start
session_start();
require "dbconnect.php";
$page = "DIAGNOSE";
include "loginheader.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['snoEdit'])) {
    // Update the record
    $sno = $_POST["snoEdit"];
    $AppeEdit = $_POST["AppeEdit"];
    $BpEdit = $_POST["BpEdit"];
    $MassEdit = $_POST["MassEdit"];
    $TempEdit = $_POST["TempEdit"];
    $PulseEdit = $_POST["PulseEdit"];
    $RemarksEdit = $_POST["RemarksEdit"];
    $MedicationEdit = $_POST["MedicationEdit"];

    // Sql query to be executed
    $sql = "UPDATE `DIAGNOSE` SET  `APPEAREANCE` = '$AppeEdit', `BP` = ' $BpEdit', `MASS` = '$MassEdit', `TEMP` = '$TempEdit', `PULSE` = '$PulseEdit', `REMARKS` = '$RemarksEdit', `MEDICATION` = '$MedicationEdit' WHERE `SNO` = '$sno';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
    } else {
      $error = true;
    }
  } else {

    $T_DATE = date("Y-m-d");
    $APPEAREANCE = $_POST["Appeareance"];
    $BP = $_POST["BP"];
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

include "header.php";
?>

<main class="diagnose">
  <section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl  modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="/dbms_miniproject/diagnosis.php" method="post">
            <div class="modal-body">
              <input type="hidden" name="snoEdit" id="snoEdit">
              <div class="row input-group row-cols-auto border border-2 border-dark align-items-center my-3">
                <label class="col visually-hidden" for="AppeEdit">Appeareance</label>
                <input type="text" class="form-control" id="AppeEdit" name="AppeEdit" placeholder="Appeareance" required>
                <label class="col visually-hidden" for="BpEdit">BP</label>
                <input type="text" class="form-control" id="BpEdit" name="BpEdit" placeholder="Bp" required>
                <label class="col visually-hidden" for="MassEdit">Mass</label>
                <input type="text" class="form-control" id="MassEdit" name="MassEdit" placeholder="Mass" required>
                <label class="col visually-hidden" for="TempEdit">Temperature</label>
                <input type="text" class="form-control" id="TempEdit" name="TempEdit" placeholder="Temperature" required>s
              </div>
              <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
                <label class="col visually-hidden" for="PulseEdit">Pulse</label>
                <input type="text" class="form-control" id="PulseEdit" name="PulseEdit" placeholder="Pulse" required>
                <label class="col visually-hidden" for="RemarksEdit">Remarks</label>
                <input type="text" class="form-control" id="RemarksEdit" name="RemarksEdit" placeholder="Remarks" required>
                <label class="col visually-hidden" for="MedicationEdit">Medication</label>
                <input type="text" class="form-control" id="MedicationEdit" name="MedicationEdit" placeholder="Medication" required>
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
      echo '<div class="container-fluid mt-2 mb-5">
                 
                          <h5 class="card-text">Add New entry</h5>
                          <form action="/dbms_miniproject/diagnosis.php" method="POST">
                            <div class="row input-group row-cols-auto border border-2 border-dark align-items-center">
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
    <table class="table table-dark" id="myTable1">
      <thead>
        <tr>
          <th scope="col">Sno</th>
          <th scope="col">T_DATE</th>
          <th scope="col">APPEAREANCE</th>
          <th scope="col" class="text-center"> BP (mm/Hg)</th>
          <th scope="col" class="text-center">MASS (kg)</th>
          <th scope="col" class="text-center">TEMP (°C)</th>
          <th scope="col" class="text-center">PULSE (bpm)</th>
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
                          <th scope='row'>" .  $sno . "</th>
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

    </div>
    <div class="container mb-4">
      <?php
      if ($doclog) {
        echo '<a class="btn btn-success col col-2" href="records.php" role="button">Records</a>';
      }
      ?>
    </div>
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
      appeareance = tr.getElementsByTagName("td")[1].innerText;
      bp = tr.getElementsByTagName("td")[2].innerText;
      mass = tr.getElementsByTagName("td")[3].innerText;
      temp = tr.getElementsByTagName("td")[4].innerText;
      pulse = tr.getElementsByTagName("td")[5].innerText;

      remarks = tr.getElementsByTagName("td")[6].innerText;
      medication = tr.getElementsByTagName("td")[7].innerText;
      console.log(appeareance, bp, mass, temp, pulse, remarks, medication);
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

<?php
include 'footer.php';
?>