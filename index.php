<?php

include 'dbconnect.php';
session_start();
session_unset();
session_destroy();
include "header.php";

?>


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

<?php
include 'footer.php';
?>