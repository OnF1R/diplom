<?php
    include_once "./templates/generation.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <body>
      <div class="header_main mb-3">
          <?php
              generation_head_menu($mysqli);
          ?>
        <div class="container mt-5">
          <div class="px-4 pt-5 my-5 text-center">
            <h1 class="display-4 fw-bold">OLEG-STROI</h1>
            <div class="col-lg-6 mx-auto">
              <p class="card header_card lead mb-4">
                Строительная организация OLEG-STROI предоставляет высококачественные услуги возведенения загородных домов из различных материалов, с использованием новейших технологий строительства и квалифицированных сотрудников.
              </p>
            </div>
            <a href="#feedback"><button type="button" class="button btn btn-lg px-4">Оставить заявку</button><a>
          </div>
        </div>
      </div>
      <div id="main" class="container">
        <div class="row justify-content-center">
          <h2>Наши проекты</h2>
          <hr>
          <?php
              generation_products_card_limit($mysqli);
          ?>
          <hr>
          <div class="d-flex justify-content-center"><a href="products.php"><button class="btn" type="submit">Показать ещё</button></a></div>
        </div>
        <div class="container mt-5">
          <h2>Информация о проектах</h2>
          <hr>
        <div id="carouselExampleCaptions" class="carousel slide mt-5 mb-5" data-bs-ride="carousel">
            <?php
            generation_products_carousel($mysqli);
             ?>
             <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
             </button>
             <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
             </button>
        </div>
       </div>
    </div>
    <div class="works">
      <div class="works_col">
        <?php
        generation_products_block($mysqli);
         ?>
      </div>
    </div>


<div id="feedback" class="container mt-5">
  <h2>Обратная связь</h2>
  <hr>
  <div class="card-body d-flex justify-content-center" style="list-style-type:none;">
    <form name="user_feedback" action="check.php" method="post">
      <input type="hidden" name="form" value="feedback">
      <div class="d-flex justify-content-center">
        <h4>Оставьте заявку</h4>
      </div>
      <div class="d-flex justify-content-center">

      </div>
        <p id="feedback_message" class="text-center fw-bold none">123</p>
        <h6 id="feedback_message_2" class="text-center none">Мы свяжемся с вами в течении 10 минут</h6>
        <div class="feedback_form form-outline mb-4"><li><label for="name"></label>Имя<input class="form-control form-control-lg" value="<?php
                                if(isset($_SESSION['user']))
                                { echo $_SESSION['user']['user_name'];
                                }?>" name="name" type="text" maxlength="32" required></li></div>
        <div class="feedback_form form-outline mb-4"><li><label for="email"></label>E-mail<input class="form-control form-control-lg" value="<?php
                                if(isset($_SESSION['user']))
                                { echo $_SESSION['user']['user_email'];
                                }?>" name="email" type="email" maxlength="32" required></li></div>
        <div class="feedback_form form-outline mb-4"><li><label for="user_text"></label>Сообщение<textarea class="form-control form-control-lg" name="user_text" rows="3" type="text" maxlength="1000" required></textarea></li></div>
          <div id="sumbit_feedback" class="feedback_form d-flex justify-content-center form-outline mb-4"><li><button class="button btn" type="submit">Отправить заявку</button></li></div>
        </form>
  </div>

  </div>
<div class="container-fluid p-0">
  <div class="album py-3 px-3 bg-light">
<div class="container">
 <h2>Последние новости</h2>
 <hr>
 <div class="row justify-content-center row-cols-md-3 g-3">
   <?php
   generation_posts_index_limit($mysqli);
    ?>
 </div>
</div>
</div>
</div>



<footer class="footer mt-auto py-3 bg-light">
  <?php
  generation_footer($mysqli);
   ?>
</footer>
<script src="js/ajax.js"></script>
</body>
</html>
