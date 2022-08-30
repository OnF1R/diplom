<?php
session_start();
include_once "mysqlConnect.php";
echo "<link rel='stylesheet' href='../css/style.css'>";
?>
<?php

function generation_head_menu ($mysqli) {
    ?>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container p-0 text-center">
    <a class="navbar-brand" href="index.php"><img src="../svg/logo.svg" style="width: 60px;" alt="OLEG-STROI"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="card navbar_card navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            О нас
          </a>
          <ul class="navbar_dropdown dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="company.php">Компания</a></li>
            <li><a class="dropdown-item" href="news.php">Новости</a></li>
            <li><a class="dropdown-item" href="guarantees.php">Гарантии</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Каталог</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">Фотогалерея</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacts.php">Контакты</a>
        </li>
        </ul>
        <ul class="card navbar_card navbar-nav ms-auto mb-2 mb-lg-0">
        <?php
          if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['id_groups'] == 1) {
              echo '<li class="nav-item"><a class="nav-link" href="admin-panel.php">Админ-панель</a></li>';
            }
            echo '<li class="nav-item"><a class="nav-link" href="profile.php">Личный кабинет </a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Выйти</a></li>';

        } else
        {
          echo '<li class="nav-item"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#authModal">Войти</button></li>';
          include_once("modal.php");
        }
         ?>
          </ul>
        </div>
       </div>
      </nav>
      </div>
    </header>
    <?php
}

function generation_posts_index ($mysqli) {
    $sql = "SELECT * FROM `articles`";
    $res = $mysqli -> query($sql);

    if (is_countable($res) !== 0) {
        while ($resArticle = $res -> fetch_assoc())
        {
            ?>
            <div class="col" style="flex: auto;">
              <div class="card shadow-sm">
                <div class="img_container">
                  <img class="news_img" src="images/<?= $resArticle['image'];?>" loading="lazy">
                  <div class="card p-1 top-left fw-bold"><?= $resArticle['title'];?></div>
                </div>
                <div class="card-body">
                  <p class="card-text"><?= mb_substr($resArticle['text'], 0, 180, 'UTF-8') ?>...</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="post.php?id_article=<?= $resArticle['id'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Подробнее</button></a>
                    </div>
                    <small class="text-muted"><?= $newDate = date("d-m-Y", strtotime($resArticle['date'])) ?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
    } else {
        echo "Нет статей";
    }
}

function generation_posts_index_sorted ($mysqli, $topicId) {
    $sql = "SELECT * FROM `articles` WHERE `id_topic` = '$topicId'";
    $res = $mysqli -> query($sql);

    if (is_countable($res) !== 0) {
        while ($resArticle = $res -> fetch_assoc())
        {
            ?>
            <div class="col mt-4" style="flex: auto;">
              <div class="card shadow-sm mb-2">
                <div class="img_container">
                  <img class="news_img" src="images/<?= $resArticle['image'];?>" loading="lazy">
                  <div class="card p-1 top-left fw-bold"><?= $resArticle['title'];?></div>
                </div>
                <div class="card-body">
                  <p class="card-text"><?= mb_substr($resArticle['text'], 0, 150, 'UTF-8') ?>...</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="post.php?id_article=<?= $resArticle['id'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Подробнее</button></a>
                    </div>
                    <small class="text-muted"><?= $newDate = date("d-m-Y", strtotime($resArticle['date'])) ?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
    } else {
        echo "Нет статей";
    }
}

function generation_posts_index_limit ($mysqli) {
    $sql = "SELECT * FROM `articles` ORDER BY `date` DESC LIMIT 3";
    $res = $mysqli -> query($sql);

    if (is_countable($res) !== 0) {
        while ($resArticle = $res -> fetch_assoc())
        {
            ?>
            <div class="col" style="flex: auto;">
              <div class="card shadow-sm mb-2">
                <div class="img_container">
                  <img class="news_img" src="images/<?= $resArticle['image'];?>" loading="lazy">
                  <div class="card p-1 top-left fw-bold"><?= $resArticle['title'];?></div>
                </div>
                <div class="card-body">
                  <p class="card-text"><?= mb_substr($resArticle['text'], 0, 180, 'UTF-8') ?>...</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="post.php?id_article=<?= $resArticle['id'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Подробнее</button></a>
                    </div>
                    <small class="text-muted"><?= $newDate = date("d-m-Y", strtotime($resArticle['date'])) ?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
    } else {
        echo "Нет статей";
    }
}

function generation_posts_topic ($mysqli, $id_topic) {
    $sql = "SELECT * FROM `articles` WHERE `id_topic` = $id_topic";
    $res = $mysqli -> query($sql);

    if ($res -> num_rows > 0) {
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" ><a href="post.php?id_article=<?= $resArticle['id'] ?>"><?= $resArticle['title'] ?></a></h5>
                    <p class="card-text"><?= mb_substr($resArticle['text'], 0, 180, 'UTF-8') ?>...</p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "В этом разделе статей нету";
    }
}

function generation_posts_names ($mysqli) {
  $sql = "SELECT * FROM `topic`";
  $resSQL = $mysqli -> query($sql);
  if ($resSQL -> num_rows > 0) {
    ?>
    <form name="selectNews" action="" method="post">
  <select id="newsSelect" name="newsSelect" onchange="this.form.submit();" class="form-select mb-5" aria-label="Default select example">
    <option value="0" selected>Последние</option>
    <?php
    while ($rowTopic = $resSQL -> fetch_assoc()) {
      ?>
        <option value="<?= $rowTopic["id"] ?>"><a class="text-center" href="./topic.php?id_topic=<?= $rowTopic["id"] ?>"><?=  $rowTopic['name'] ?></a></li>
    <?php
  }
    ?>

  </select>
</form>
    <?php

  } else {
      ?>
          <p>Нет тем новостей</p>
      <?php
  }

  if(isset($_POST['newsSelect']) )
    {

      $value = $_POST['newsSelect'];
      $sql = "SELECT * FROM `topic` WHERE `id` = '$value'";
      $resSQL = $mysqli -> query($sql);
      $rowTopic = $resSQL -> fetch_assoc();
      ?>
      <script type="text/javascript">
        document.querySelector('#newsSelect').classList.add("none");
      </script>
        <div class="" style="display: block;">
            <h3 class="mb-3"><?php echo $rowTopic['name']; ?></h3>
            <a class="mb-3 back_link" href="news.php">Назад</a>
        </div>
      <div class="row justify-content-center row-cols-md-3 g-3">
      <?php
      generation_posts_index_sorted($mysqli, $value);
      ?>
      </div>
      <?php

    } else {
      ?>
      <div class="row justify-content-center row-cols-md-3 g-3">
      <?php
      generation_posts_index_limit($mysqli);
      ?>
      </div>
      <?php
    }

}

function generation_post ($mysqli, $id_article) {
    $sql = "SELECT * FROM `articles` WHERE `id` = '$id_article'";
    $res = $mysqli -> query($sql);


    if ($res -> num_rows === 1) {
        $resPost = $res -> fetch_assoc();?>
        <h1><?= $resPost['title'] ?></h1>
        <p><?= $resPost['text'] ?></p>
        <p>Дата публикации: <?= substr($resPost['date'], 0, 11) ?></p>
        <?php
    }
}

function generation_comment ($mysqli, $id_article) {
    $sql = "SELECT * FROM `comments` WHERE `id_article` = $id_article";
    $resSQL = $mysqli -> query($sql);

    if ($resSQL -> num_rows > 0) {
        while ($resComment = $resSQL -> fetch_assoc()) {
            ?>
            <div class="comment">
                <p><b><?= $resComment['username']?></b></p>
                <p><b><?= $resComment['comment']?></b></p>
                <p>Оставлен: <?= substr($resComment['date'], 0, 11)  ?></p>
            </div>
            <hr>
            <?php
        }
    } else {
        ?>
            <p>Комментариев нет</p>
        <?php
    }
}

function generation_rating ($mysqli, $id_product) {
    $sql = "SELECT * FROM `reviews` WHERE `id_product` = $id_product";
    $resSQL = $mysqli -> query($sql);

    if ($resSQL -> num_rows > 0) {
        while ($resRating = $resSQL -> fetch_assoc()) {
            ?>
            <div class="rating">
                <p><b><?= $resRating['username']?></b></p>
                <p><b><?= $resRating['comment']?></b></p>
                <p>Оценка: <?= $resRating['rating']?></p>
                <p>Оставлен: <?= substr($resRating['date'], 0, 11)  ?></p>
            </div>
            <hr>
            <?php
        }
    } else {
        ?>
            <p>Отзывов нет</p>
        <?php
    }
}

function generation_products_card_limit ($mysqli) {
    $sql = "SELECT * FROM `products` ORDER BY RAND() LIMIT 6";
    $resSQL = $mysqli -> query($sql);

    if ($resSQL -> num_rows > 0) {
        while ($resProducts = $resSQL -> fetch_assoc()) {
            ?>
              <div class="mb-3 col-xl-4 col-lg-6 col-sm-6">
                <a class="d-flex justify-content-center" href="product_page.php?id_product=<?= $resProducts['id'] ?>"><img src="images/<?= $resProducts['image']; ?>" class="img-fluid mt-2" style="object-fit: cover; height: 300px;  overflow: hidden;" loading="lazy" alt=""></a>
                <h3>Проект:  <?= $resProducts['name']; ?></h3>
                <p><?= mb_substr($resProducts['description'], 0, 115, 'UTF-8') ?>...</p>
                <div class="d-flex justify-content-between">
                  <p class="text fw-bold"><?= $resProducts['price']; ?> ₽</p>
                  <a href="product_page.php?id_product=<?= $resProducts['id'] ?>"><p>Подробнее...</p></a>
                </div>
              </div>
            <?php
        }
    } else {
        ?>
            <p>Товары не найдены</p>
        <?php
    }
}

function generation_products_card ($mysqli) {
    $sql = "SELECT * FROM `products`";
    $resSQL = $mysqli -> query($sql);

    if ($resSQL -> num_rows > 0) {
        while ($resProducts = $resSQL -> fetch_assoc()) {
            ?>
              <div class="mb-3 col-xl-4 col-lg-6 col-sm-6">
                <a class="d-flex justify-content-center" href="product_page.php?id_product=<?= $resProducts['id'] ?>"><img src="images/<?= $resProducts['image']; ?>" class="img-fluid mt-2" style="object-fit: cover; height: 300px;  overflow: hidden;" loading="lazy" alt=""></a>
                <h3>Проект:  <?= $resProducts['name']; ?></h3>
                <p><?= mb_substr($resProducts['description'], 0, 115, 'UTF-8') ?>...</p>
                <div class="d-flex justify-content-between">
                  <p class="text fw-bold"><?= $resProducts['price']; ?> ₽</p>
                  <a href="product_page.php?id_product=<?= $resProducts['id'] ?>"><p>Подробнее...</p></a>
                </div>
              </div>
            <?php
        }
    } else {
        ?>
            <p>Товары не найдены</p>
        <?php
    }
}

function generation_product_page ($mysqli, $id_product) {
    $sql = "SELECT * FROM `products` WHERE `id` = '$id_product'";
    $sql2 = "SELECT AVG(rating) AS rating FROM `reviews` WHERE `id_product` = '$id_product'";
    $res = $mysqli -> query($sql);
    $res2 = $mysqli -> query($sql2);


    if ($res -> num_rows === 1) {
        $resProduct = $res -> fetch_assoc();
        $avgRating = $res2 -> fetch_assoc();
        $temp = $resProduct['type_of_work'];
        $sql = "SELECT `type_work` FROM `type_of_work` WHERE `id` = '$temp'";
        $res = $mysqli -> query($sql);
        $typeWork = $res -> fetch_assoc();?>
        <h1>Проект: <?= $resProduct['name'] ?></h1>
        <hr>

        <div class="col-lg-8">
          <img src="images/<?= $resProduct['image']; ?>"  class="img-fluid" style="max-height: 500px;" loading="lazy" alt="">
        </div>
        <div class="fw-bold col-lg-4 mt-4">
          <div class="row mb-0">
            <div class="fw-bold d-flex justify-content-between">
            <p class="text-center p-1" style="font-size: 24px;"><?= $resProduct['price'] ?> ₽</p>
            <a class="nav-link p-0" href="checkout.php?id_product=<?= $resProduct['id'] ?>"><button class="btn add-to-cart p-2" type="submit">Оформить заказ</button></a>
            </div>
            <div class="text-center mt-3">
              <p>Средний рейтинг: <?= $avgRating['rating'] ?> / 5</p>
            </div>
            <div class="mt-5">
              <div class="col-lg-12 random p-1" style="font-size: 18px;"><b>Общая площадь дома:</b> <?= $resProduct['area'] ?> м<sup><small>2</small></sup></div>
              <div class="col-lg-12 random p-1" style="font-size: 18px;"><b>Количество этажей: </b><?= $resProduct['floor'] ?></div>
              <div class="col-lg-12 random p-1" style="font-size: 18px;"><b>Количество спален: </b><?= $resProduct['bedrooms'] ?></div>
              <div class="col-lg-12 random p-1" style="font-size: 18px;"><b>Количество входов: </b><?= $resProduct['entry'] ?></div>
              <div class="col-lg-12 random p-1" style="font-size: 18px;"><b>Тип дома: </b><?=$typeWork['type_work'];?></div>
            </div>

          </div>



        </div>
        <p class="mt-4"> <?= $resProduct['description'] ?></p>
        <div class="row text-left">

        </div>

        <?php
    }
}

function generation_profile ($mysqli) {
    if (isset($_SESSION['user'])) {
            ?>
            <h2>Ваш профиль</h2>
            <span class="text fw-bold">Логин: </span><?=$_SESSION['user']['user_login']?><br>
            <span class="text fw-bold">Имя: </span><?=$_SESSION['user']['user_name']?><br>
            <span class="text fw-bold">E-mail: </span><?=$_SESSION['user']['user_email']?>

            <?php
        } else {
        ?>
            <p>Пожалуйста <a href="../auth.php">авторизируйтесь</a> для отображения профиля</p>
        <?php
    }
}


function generation_products_block ($mysqli) {
  $sql = "SELECT * FROM `products` ORDER BY RAND() LIMIT 8";
  $resSQL = $mysqli -> query($sql);

    if ($resSQL -> num_rows > 0) {
      while ($resProduct = $resSQL -> fetch_assoc()) {
        ?>
          <div class="works_item">
            <img class="works_image" src="images/<?= $resProduct['image']; ?>" loading="lazy" alt="">
            <div class="works_info">
              <div class="works_title"><?= $resProduct['name']; ?></div>
              <div class="works_text"><?= $resProduct['description']; ?></div>
              <a class="nav-link" style="color: white;  text-decoration: underline;" href="product_page.php?id_product=<?= $resProduct['id'] ?>"><p>Подробнее...</p></a>
            </div>
          </div>
        <?php

    }
  }
}

function generation_checkout ($mysqli, $id_product) {
  $sql = "SELECT * FROM `products` WHERE `id` = '$id_product'";
  $res = $mysqli -> query($sql);
  if ($res -> num_rows === 1) {
    $resProduct = $res -> fetch_assoc();
    $temp = $resProduct['type_of_work'];
    $sql = "SELECT `type_work` FROM `type_of_work` WHERE `id` = '$temp'";
    $res = $mysqli -> query($sql);
    $typeWork = $res -> fetch_assoc();
    ?>
  <div class="container">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span>Выбранные дома</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item lh-sm mb-3">
            <img src="images/<?= $resProduct['image']; ?>"  class="img-fluid" style="max-height: 500px;" loading="lazy" alt="">
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm  mb-3">
            <div>
              <h6 class="fw-bold"><?= $resProduct['name']; ?></h6>
              <small class="text-muted"><?= mb_substr($resProduct['description'], 0, 115, 'UTF-8') ?>...</small>
            </div>
            <span class="fw-bold"><?= $resProduct['price']; ?>₽</span>
          </li>
          <li class="list-group-item lh-sm">
            <div class="col-lg-12 random p-1"><b>Общая площадь дома:</b> <?= $resProduct['area'] ?> м<sup><small>2</small></sup></div>
            <div class="col-lg-12 random p-1"><b>Количество этажей: </b><?= $resProduct['floor'] ?></div>
            <div class="col-lg-12 random p-1"><b>Количество спален: </b><?= $resProduct['bedrooms'] ?></div>
            <div class="col-lg-12 random p-1"><b>Количество входов: </b><?= $resProduct['entry'] ?></div>
            <div class="col-lg-12 random p-1"><b>Тип дома: </b><?=$typeWork['type_work'];?></div>
          </li>
        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <form name="create_order" action="check.php" method="post">
          <input type="hidden" name="form" value="create_order">
          <input type="hidden" name="id_product" value="<?php echo $id_product; ?>" required>
          <div class="row g-3">
            <div class="col-12">
              <label for="username" class="form-label">Имя пользователя</label>
              <?php
                if (isset($_SESSION['user'])) {
                    echo '<input type="text" class="form-control" id="firstName" name="username" placeholder="ФИО" value="'. $_SESSION['user']['user_name'] .'" required>';
                }
                else {
                  echo '<input type="text" class="form-control" id="firstName" name="username" placeholder="ФИО" value="" required>';
                }
              ?>
            </div>

              <?php
                if (isset($_SESSION['user'])) {
                    echo '<div class="col-12">';
                    echo '<label for="username" class="form-label">Логин</label>';
                    echo '<input type="text" name="user_login" class="form-control" id="userlogin" placeholder="Логин" value="'. $_SESSION['user']['user_login'] .'" required>';
                    echo '</div>';
                }
                else {
                  $null = NULL;
                  echo '<input type="hidden" name="user_login" id="userlogin" placeholder="Логин" value="'.$null.'" required>';
                }
              ?>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <?php
                if (isset($_SESSION['user'])) {
                    echo '<input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="'. $_SESSION['user']['user_email'] .'" required>';
                }
                else {
                  echo '<input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>';
                }
              ?>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Адрес</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="Улица 4 дом 1" required>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Адрес 2 <span class="text-muted">(Необязательно)</span></label>
              <input type="text" name="address_2" class="form-control" id="address2" placeholder="Квартира 21 этаж 5">
            </div>

            <div class="col-md-5">
              <label for="country" name="country" class="form-label">Country</label>
              <input type="text" name="country" class="form-control" id="country" placeholder="Российская Федерация">
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Город</label>
              <input type="text" name="state" class="form-control" id="state" placeholder="Москва">
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" name="zip" class="form-control" id="zip" placeholder="117812" required>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Платёжные данные</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Кредитная карта</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Дебетовая карта</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Имя владельца карты</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Полное имя отображено на лицевой стороне карты</small>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Номер карты</label>
              <input type="text" class="form-control" id="cc-number" placeholder="1234 5678 9012 3456" required>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Дата окончания</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="02/26" required>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV-Код</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="123" required>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address" required>
            <label class="form-check-label" for="same-address">Подверждение обработки персональных данных</label>
          </div>

          <button class="w-100 btn btn-lg" type="submit">Отправить данные</button>
        </form>
      </div>
    </div>
  <?php
  }
}


function generation_admin_panel_orders($mysqli) {
  $sql = "SELECT * FROM `orders`";
  $resSQL = $mysqli -> query($sql);
  ?>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Имя пользователя</th>
          <th scope="col">Логин пользователя</th>
          <th scope="col">Email</th>
          <th scope="col">Адрес</th>
          <th scope="col">Адрес 2</th>
          <th scope="col">Страна</th>
          <th scope="col">Город</th>
          <th scope="col">Почтовый индекс</th>
          <th scope="col">Выбранное здание</th>
        </tr>
      </thead>
  <?php
  while($res = $resSQL -> fetch_assoc()) {
  ?>
  <tbody>
    <tr>
      <td><?= $res['username']; ?></td>
      <td><?= $res['userlogin']; ?></td>
      <td><?= $res['email']; ?></td>
      <td><?= $res['address']; ?></td>
      <td><?= $res['address_2']; ?></td>
      <td><?= $res['country']; ?></td>
      <td><?= $res['state']; ?></td>
      <td><?= $res['zip']; ?></td>
      <?php
      $id = $res['id_product'];
      $sql2 = "SELECT `name` FROM `products` WHERE `id` = '$id'";
      $resSQL2 = $mysqli -> query($sql2);
      $result = $resSQL2 -> fetch_assoc();
       ?>
      <td><a href="product_page.php?id_product=<?= $id ?>"><?= $result['name']; ?></a>
    </td>
    </tr>
  </tbody>
  <?php
  }
  echo '</table>';
  echo '</div>';
}


function generation_admin_panel_feedback($mysqli) {
  $sql = "SELECT * FROM `feedback`";
  $resSQL = $mysqli -> query($sql);
  ?>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Имя пользователя</th>
          <th scope="col">Email</th>
          <th scope="col">Сообщение</th>
          <th scope="col">Статус</th>
        </tr>
      </thead>
  <?php
  while($res = $resSQL -> fetch_assoc()) {
  ?>
  <tbody>
    <tr>
      <td><?= $res['name']; ?></td>
      <td><?= $res['email']; ?></td>
      <td><p><?= $res['text']; ?></p></td>
      <?php if ($res['complete']) {
        echo '<td class="text-success">Обращение обработано!</td>';
      } else {
        echo '<td class="text-danger">Обращение не обработано!</td>';
      } ?>
    </tr>
  </tbody>
  <?php
  }
  echo '</table>';
  echo '</div>';
}

function generation_footer ($mysqli) {
  ?>
  <div class="container">
    <div class="row text-center">
      <div class="col">
      <a class="dropdown-item" href="company.php">Компания</a>
      </div>
      <div class="col">
      <a class="dropdown-item" href="news.php">Новости</a>
      </div>
      <div class="col">
      <a class="dropdown-item" href="guarantees.php">Гарантии</a>
      </div>
      <div class="col">
      <a class="dropdown-item" href="products.php">Каталог</a>
      </div>
      <div class="col">
      <a class="dropdown-item" href="gallery.php">Фотогалерея</a>
      </div>
      <div class="col">
      <a class="dropdown-item" href="contacts.php">Контакты</a>
      </div>
    </div>
    <p class="text-center pt-2 m-0">Все права защищены. ©</p>
  </div>
  <?php

}

function generation_products_carousel ($mysqli){
  $sql = "SELECT * FROM `products` ORDER BY RAND()";
  $resSQL = $mysqli -> query($sql);
  if ($resSQL -> num_rows > 0) {
    $output = '';
    $carousel_item = '';
    $count = 0;
    $slidenum =0;
    while($resProduct = $resSQL -> fetch_assoc()){
      if($count == 0)
      {
       $output .= '
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$count.'" class="active" aria-current="true" aria-label="Slide '. ++$count .'"></button>
       ';
       $carousel_item .= '
       <div class="carousel-item active">
        <img src="../images/'. $resProduct['image'].'" class="d-block w-100 carousel_img" loading="lazy" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <div class="card carousel_card">
            <h5 class="text-dark">'. $resProduct['name'].'</h5>
            <p class="text-dark">'. $resProduct['description'].'</p>
            <a href="product_page.php?id_product='. $resProduct['id']. '"><p>Подробнее...</p></a>
          </div>
        </div>
      </div>
       ';
      }
      else
      {
       $output .= '
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'. $count .'" aria-label="Slide '. ++$count .'"></button>
       ';
       $carousel_item .= '
       <div class="carousel-item">
        <img src="../images/'. $resProduct['image'].'" class="d-block w-100 carousel_img" loading="lazy" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <div class="card carousel_card">
            <h5 class="text-dark">'. $resProduct['name'].'</h5>
            <p class="text-dark">'. $resProduct['description'].'</p>
            <a href="product_page.php?id_product='. $resProduct['id']. '"><p>Подробнее...</p></a>
          </div>
        </div>
      </div>
       ';
      }
      $count = $count++;
     }
     echo '<div class="carousel-indicators">';
     echo $output;
     echo '</div>';
     echo '<div class="carousel-inner">';
     echo $carousel_item;
     echo '</div>';
    }
      ?>
      <?php
}
