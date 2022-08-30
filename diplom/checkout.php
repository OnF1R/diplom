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
    <title>Оформление заявки</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <?php
        generation_head_menu($mysqli);
    ?>

    <div class="container">
      <h2>Форма оформления заказа</h2>
      <hr>
      <?php
      generation_checkout($mysqli, $id_product);
       ?>
    </div>
    </div>

</body>
<footer class="footer mt-auto py-3 bg-light">
  <?php
  generation_footer($mysqli);
   ?>
</footer>
</html>
