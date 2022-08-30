<?php
include_once "./templates/generation.php";
$id_article = $_REQUEST["id_article"];

function send_comment ($mysqli, $comment, $username, $id_article) {
    $sql = "INSERT INTO `comments` (`comment`, `username`, `id_article`, `date`) VALUES ('$comment', '$username', '$id_article', CURRENT_TIMESTAMP)";
    $mysqli -> query($sql);
    echo '<script>location.replace("http://oleg-stroi.ru/post.php?id_article=' . $id_article . '");</script>'; exit;
}

if (isset($_REQUEST['doGo']) === true) {
    send_comment($mysqli, $_REQUEST['comment'], $_REQUEST['username'], $id_article);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статья</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css"></head>
<body>
    <?php
        generation_head_menu($mysqli);
    ?>
    <div class="container">
        <?php
        generation_post($mysqli, $id_article);
        ?>
    </div>
    <div class="comments container">
        <hr>
        <?php
          if (isset($_SESSION['user'])) {
            echo '<form action="' . $_SERVER["SCRIPT_NAME"] . '">';
              echo '<input name="username" class="form-control mb-3" value="'. $_SESSION['user']['user_name'] .'">';
              echo '<textarea class="form-control mb-3" name="comment" id="" rows="3"></textarea>';
              echo '<input type="hidden" name="id_article" value="' . $id_article . '">';
              echo '<input name="doGo" class="mb-3" type="submit" value="Отправить">';
            echo '</form>';
          }
          else {
            echo '<p class="font-weight-bold">Нужно быть авторизованным чтобы оставлять комментарии.</p>';
            echo '<hr>';
          }
        ?>
        <p>Комментарии:</p>
        <hr>

        <?php
            generation_comment($mysqli, $id_article);
        ?>
    </div>
    <footer class="footer mt-auto py-3 bg-light">
      <?php
      generation_footer($mysqli);
       ?>
    </footer>
</body>
</html>
