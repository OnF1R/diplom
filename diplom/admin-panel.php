<?php
    include_once "./templates/generation.php";
?>


<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ-панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <?php
        generation_head_menu($mysqli);
    ?>
<body>
  <div class="container">
    <h2>Оформленные заказы</h2>
    <hr>
    <div class="table-responsive">
      <?php
        generation_admin_panel_orders($mysqli);
       ?>
  </div>
  <h2>Сообщения обратной связи</h2>
  <hr>
  <div class="table-responsive">
    <?php
      generation_admin_panel_feedback($mysqli);
     ?>
</div>
  </div>
</body>
</html>
