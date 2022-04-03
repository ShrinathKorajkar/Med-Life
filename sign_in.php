<?php
include "header.php";
?>

<main style="overflow: scroll;">
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $showAlert = false;

    include 'dbconnect.php';
    $name = $_POST["name"];
    $aadhaar = $_POST["aadhaar"];
    $age = $_POST["age"];
    $bloodgroup = $_POST["bloodgroup"];
    $birthdayDate = $_POST["birthdayDate"];
    $gender = $_POST["gender"];
    $phoneNumber = $_POST["phoneNumber"];
    $emergency = $_POST["emergency"];


    $sql1 = "INSERT INTO `user` (`AADHAR_NO`, `USERNAME`) VALUES ('$aadhaar', '$name');";
    $sql = "INSERT INTO `p_details` (`AADHAR_NO`, `AGE`, `BLOOD_GRP`, `DOB`, `CONTACT_NO`, `ECONTACT_NO`, `GENDER`) VALUES ('$aadhaar', '$age', '$bloodgroup', '$birthdayDate', '$phoneNumber', '$emergency', '$gender');";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    if ($result && $result1) {
      $showAlert = true;
    }
    if ($showAlert) {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Regestered Successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
      echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Registration Failed Try Once Again
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
    }
  }
  ?>
  <section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Terms of Service</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <ol class="list-group list-group-numbered">
              <li class="list-group-item">By accessing or using the Platform or the Service, or by otherwise giving Us Your information, You confirm that You have the capacity to enter into a legally binding contract under Indian law, in particular, the Indian Contract Act, 1872, and have read, understood and agreed to the practices and policies outlined in this Privacy Policy and agree to be bound by the Privacy Policy.</li>
              <li class="list-group-item">You hereby consent to Our collection, use, sharing, and disclosure of Your information as described in this Privacy Policy. We reserve the right to change, modify, add or delete portions of the terms of this Privacy Policy, at Our sole discretion, at any time, and any continued use of the App, the Services or the Platform, following any such amendments to the Privacy Policy, will be deemed as an implicit acceptance of the Privacy Policy in its amended form. You are requested to review the Privacy Policy from time to time to keep yourself updated with any changes; modifications made to the terms hereof.</li>
              <li class="list-group-item">If You are accessing or using Services on the App or the Site from an overseas location, You do so at Your own risk, and shall be solely liable for compliance with any applicable local laws.</li>
              <li class="list-group-item">If You do not agree with any of the terms and conditions of this Privacy Policy, please do not proceed further to use this Site or the App or any Services. This Privacy Policy is subject to change at any time without notice. To make sure You are aware of any changes, please review this policy on this Site or the App periodically.</li>
            </ol>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="vh-100 ">
    <div class="container col-10 py-5 h-90">
      <div class="row  justify-content-center align-items-center h-90">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 text-decoration-underline">
              <center> Registration Form</center>
            </h2>
            <h5 class="mb-4 pb-2 pb-md-0 mb-md-5">Enter Your Details</h5>
            <form action="/dbms_miniproject/sign_in.php" method="post">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="name" name="name" required class="form-control form-control-lg" />
                    <label class="form-label" for="name">Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="tel" id="aadhaar" name="aadhaar" required class="form-control form-control-lg" maxlength="12" minlength="12" />
                    <label class="form-label" for="aadhaar">Aadhaar no</label>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="number" id="age" name="age" min="1" max="150" required class="form-control form-control-lg" />
                    <label class="form-label" for="age">Age</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <select class="form-select form-select-lg" id="bloodgroup" name="bloodgroup" aria-label=".form-select-lg example">
                      <option selected>
                        <h6 class="fs-6"> Select</h6>
                      </option>
                      <option value="A +ve">A +ve</option>
                      <option value="A -ve">A -ve</option>
                      <option value="B +ve">B +ve</option>
                      <option value="B -ve">B -ve</option>>
                      <option value="AB +ve">AB +ve</option>
                      <option value="AB -ve">AB -ve</option>>
                      <option value="O +ve">O +ve</option>
                      <option value="O -ve">O -ve</option>
                    </select>
                    <label class="form-label" for="bloodgroup">Blood Group</label>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <input type="date" class="form-control form-control-lg" id="birthdayDate" name="birthdayDate" required />
                    <label for="birthdayDate" class="form-label">Date of Birth</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <h6 class="mb-2 pb-1">Gender: </h6>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" checked required />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" required />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="otherGender" value="other" required />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="tel" id="phoneNumber" name="phoneNumber" required class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="tel" id="emergency" name="emergency" required class="form-control form-control-lg" />
                    <label class="form-label" for="emergency">Emergency Phone no</label>
                  </div>
                </div>

                <div class="form-check d-flex justify-content-center m-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" name="form2Example3c" required />
                  <label class="form-check-label" for="form2Example3">
                    I agree all statements in <button type="button" class="btn btn-light bg-light text-primary btn-outline-light text-decoration-underline" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Terms & Conditions
                    </button>
                  </label>
                </div>
                <div class=" d-flex justify-content-center">
                  <button type="submit" class="btn btn-block  px-5 text-body" style="background-color:rgba(0, 0, 255, 0.507) ">Register</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>


<?php
include 'footer.php';
?>