<?php
session_start();
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = false;
  require 'dbconnect.php';
  $doc_id = $_POST["doc_id"];
  $password = $_POST["password"];
  $sql = "Select * from doc where doc_id='$doc_id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $verify = password_verify($password, $row['PASSWORDS']);
    if ($verify) {
      $doc_name = $row['doc_name'];
      $login = true;
      $_SESSION['doclog'] = true;
      $_SESSION['docname'] = $doc_name;
      header("location: user.php");
    }
  }
  if (!$login) {
    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Invalid User Id Or Password
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> ';
  }
}
?>

<main class="doc">
  <section>
    <div class="container py-5 ">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="/MyMedicLife/doctor.php" method="POST">
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                    <div class="input-group flex-nowrap">
                      <span class="input-group-text" id="doc_id">DOCTOR ID :</span>
                      <input type="text" class="form-control" name="doc_id" pattern=".{10,10}" required placeholder="eg : BEG9543210" aria-label="doc_id" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group pt-3 flex-nowrap">
                      <span class="input-group-text" id="password">PASSWORD :</span>
                      <input type="password" class="form-control" name="password" minlength="4" required aria-label="password" aria-describedby="addon-wrapping">
                    </div>
                    <div class="pt-3 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>
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