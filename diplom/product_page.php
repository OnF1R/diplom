<?php
include_once "./templates/generation.php";
$id_product = $_REQUEST["id_product"];

function send_rating ($mysqli, $comment, $username, $id_product, $rating) {
    $sql = "INSERT INTO `reviews` (`comment`, `username`, `id_product`, `rating`, `date`) VALUES ('$comment', '$username', '$id_product', '$rating', CURRENT_TIMESTAMP)";
    $mysqli -> query($sql);
    echo '<script>location.replace("http://oleg-stroi.ru/product_page.php?id_product=' . $id_product . '");</script>'; exit;
}

if (isset($_REQUEST['doGo']) === true) {
    send_rating($mysqli, $_REQUEST['comment'], $_REQUEST['username'], $id_product, $_REQUEST['rating']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товар</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css"></head>
<body>
    <?php
        generation_head_menu($mysqli);
    ?>
    <div class="container">
      <div class="row ">
        <?php
        generation_product_page($mysqli, $id_product);
        ?>
      </div>
    </div>
    <div class="rating container">
        <hr>
        <?php
          if (isset($_SESSION['user'])) {
            echo '<p>Оставить отзыв:</p>';
            echo '<form action="' . $_SERVER["SCRIPT_NAME"] . '">';
              echo '<input name="username" class="form-control mb-3" value="'. $_SESSION['user']['user_name'] .'">';
              echo '<textarea class="form-control mb-3" name="comment" id="" rows="3"></textarea>';
              echo '<input type="hidden" name="id_product" value="' . $id_product . '">';
              echo '<select id="rating" name="rating" class="form-select mb-3" required>';
              echo '<option disabled selected>Выберите оценку</option>';
              echo '<option value="1">1</option>';
              echo '<option value="2">2</option>';
              echo '<option value="3">3</option>';
              echo '<option value="4">4</option>';
              echo '<option value="5">5</option>';
              echo '</select>';
              echo '<input name="doGo" class="mb-3" type="submit" value="Отправить">';
            echo '</form>';
          }
          else {
            echo '<p class="font-weight-bold">Нужно быть авторизованным чтобы оставлять отзывы.</p>';
            echo '<hr>';
          }
        ?>
        <p>Отзывы:</p>
        <hr>

        <?php
            generation_rating($mysqli, $id_product);
        ?>
    </div>
    <footer class="footer mt-auto py-3 bg-light">
      <?php
      generation_footer($mysqli);
       ?>
    </footer>
</body>
</html>
