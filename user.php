<?php
session_start();
include "header.php";
?>


<main class="d-grid p-2 user">
  <section>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $login = false;
      include 'dbconnect.php';
      $aadhar_no = $_POST["aadhar_no"];

      if (!isset($_SESSION['doclog']) && isset($_POST["g-recaptcha-response"])) {
        $password = $_POST["password"];
        $captcha = $_POST["g-recaptcha-response"];
        $seckey = "6LdDm0gfAAAAAGAcY5hXGUR3J9aEcSGNjU8dIEvb";

        $verifyresponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $seckey . '&response=' . $captcha);
        $responsedata = json_decode($verifyresponse);
        if ($responsedata->success) {

          $sql = "Select * from user where aadhar_no='$aadhar_no'";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            $verify = password_verify($password, $row['USER_PASSWORD']);
            if ($verify) {
              $login = true;
              $_SESSION['userlog'] = true;
              $_SESSION['aadhar_no'] = $aadhar_no;
              header("location: records.php");
            }
          }
        }
      } elseif (isset($_SESSION['doclog'])) {
        $sql = "Select * from user where aadhar_no='$aadhar_no'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
          $login = true;
          $_SESSION['userlog'] = true;
          $_SESSION['aadhar_no'] = $aadhar_no;
          header("location: records.php");
        }
      }

      if (!$login) {
        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Invalid User Id Or Password Or Failed recaptcha
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
      }
    }
    ?>
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center">
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

                    <?php
                    if (!isset($_SESSION['doclog'])) {
                      echo '<div class="input-group pt-3 flex-nowrap">
                            <span class="input-group-text" id="password">PASSWORD :</span>
                            <input type="password" class="form-control" name="password" minlength="4" required aria-label="password" aria-describedby="addon-wrapping">
                            </div>
                            <div class="pt-3 mb-2">
                            <div class="g-recaptcha d-flex m-2" data-sitekey="6LdDm0gfAAAAAPHwTIjMiWiZpQUi7Eyg8Lu88aiy"></div>
                            </div>';
                    }
                    ?>

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