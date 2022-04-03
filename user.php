<?php
session_start();
include "header.php";
?>


<main class="d-grid p-2" style="overflow: scroll;">
  <section>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $login = false;
      include 'dbconnect.php';
      $aadhar_no = $_POST["aadhar_no"];

      $sql = "Select * from user where aadhar_no='$aadhar_no'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if ($num == 1) {
        $login = true;
        $_SESSION['userlog'] = true;
        $_SESSION['aadhar_no'] = $aadhar_no;
        header("location: records.php");
      }
      if (!$login) {
        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Invalid User Id
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
      }
    }
    ?>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="/dbms_miniproject/user.php" method="POST">
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                    <div class="input-group flex-nowrap">
                      <span class="input-group-text" id="aadhar_no">USER ID :</span>
                      <input type="text" required class="form-control" name="aadhar_no" placeholder="aadhar no " maxlength="12" minlength="12" aria-label="aadhaar_no" aria-describedby="addon-wrapping">
                    </div>
                    <div class="pt-3 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="sign_in.php" style="color: #393f81;">Register here</a></p>
                  </form>
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