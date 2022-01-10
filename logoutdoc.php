<?php
echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Log Out Successfull</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
session_start();
$location = "doctor.php";
session_unset();
session_destroy();
header("location:" . $location . "");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>