<?php
    include_once "./templates/generation.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Обратная связь</title>
    <style type="text/css">
      * {
        list-style-type: none;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php
        generation_head_menu($mysqli);
    ?>
    <div class="container d-flex justify-content-center">
          <div class="mb-4" style="border-radius: 15px;">
                <h2 class="text-uppercase text-center mb-5">Обратная связь</h2>
                <a href="index.php#feedback"><h5 class="text-center">Форма обратной связи</h5></a>
                  <h5 class="text-center">Email: support@oleg-stroi.ru</h5>
                  <h5 class="text-center">Телефон: +7 (909) 255-32-32</h5>
                  <h5 class="text-center">Адрес: г.Москва, красного маяка 4к1</h5>
                </div>
            </div>
            <div class="container map mb-5">
              <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad8ba847712e69938002d3c790791695a95d811d2ddb175259864faa4028c17b8&amp;width=100%&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>

            </div>

    </div>
    <footer class="footer mt-auto py-3 bg-light">
      <?php
      generation_footer($mysqli);
       ?>
    </footer>
</body>
</html>
