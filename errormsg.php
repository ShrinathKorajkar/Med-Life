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

                echo "<a class='btn btn-primary card-title col-2' href='logoutuser.php' role='button'>User logout</a>";
            }
            if ($doclog) {

                echo "<a class='btn btn-primary card-title col col-2' href='logoutdoc.php' role='button'>Doc logout</a>";
            }

            echo ' 
            </div>
            <div class="accordion accordion-flush" id="accordionExample">
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h5 class="card-title">' . $page . '</h5>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body ">';
            ?>