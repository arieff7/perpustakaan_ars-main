<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

  <!-- Favicon icon -->
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <!-- font css -->
  <link rel="stylesheet" href="/assets/fonts/inter/inter.css">
  <link rel="stylesheet" href="/assets/fonts/feather.css">
  <link rel="stylesheet" href="/assets/fonts/fontawesome.css">
  <link rel="stylesheet" href="/assets/fonts/material.css">

  <!-- custom css -->
  <link rel="stylesheet" href="/assets/css/styles.css">

  <!-- vendor css -->
  <!-- <link rel="stylesheet" href="assets/css/style.css" id="main-style-link"> -->

  <title><?= $title; ?></title>
</head>

<body>

  <?= $this->include('layout/navbar'); ?>
  <?= $this->renderSection('content'); ?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  <!-- Required Js -->
  <script src="/assets/js/vendor-all.min.js"></script>
  <script src="/assets/js/plugins/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/feather.min.js"></script>
  <script src="/assets/js/pcoded.min.js"></script>

</body>

</html>