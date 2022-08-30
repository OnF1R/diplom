<?php
    include_once "./templates/generation.php";
?>


<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фотогалерея</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <?php
        generation_head_menu($mysqli);
    ?>
<body>

  <div class="container">
    <h2>Фотогалерея</h2>
    <hr>
    <!-- Gallery -->
<div class="row">
  <div class="col-lg-4 mb-lg-0">
    <img
      src="images/home1.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
      src="images/home2.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>

  <div class="col-lg-4 mb-lg-0">
    <img
      src="images/home3.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
      src="images/home4.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>

  <div class="col-lg-4 mb-lg-0">
    <img
      src="images/home5.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
      src="images/home6.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>
  <div class="col-lg-4 mb-lg-0">
    <img
      src="images/home7.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
      src="images/home8.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>
  <div class="col-lg-4 mb-lg-0">
    <img
      src="images/home9.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
      src="images/home10.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>
  <div class="col-lg-4 mb-lg-0">
    <img
      src="images/home11.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />

    <img
      src="images/home12.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
    />
  </div>
</div>
  </div>
  <footer class="footer mt-auto py-3 bg-light">
    <?php
    generation_footer($mysqli);
     ?>
  </footer>
</body>
</html>
