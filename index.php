<?php

include 'dbconnect.php';
session_start();
session_unset();
session_destroy();
include "header.php";

?>


<main class="d-grid p-2 index">
  <section>
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <h2 class="text-center fw-bold text-primary ">Welcome To MyMedicLife</h2>
        <h6 class="text-center fw-bold text-danger "> Your PersonaL Medical Database</h6>
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

<?php
include 'footer.php';
?>