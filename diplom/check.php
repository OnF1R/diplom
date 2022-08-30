<?php
  session_start();
  require_once("./templates/mysqlConnect.php");

  switch ($_POST['form']) {
    case 'reg':
      $login = $_POST["login"];
      $name = $_POST["name"];
      $email = $_POST["email"];
      $hash = str_rand();
      $password = $_POST["password"] . $hash;
      $confirm = $_POST["confirm"] . $hash;



      if ($password === $confirm)
      {
        $verify= $mysqli -> query("SELECT * FROM `users` WHERE `user_login` = '$login'");
        $user = $verify -> fetch_assoc();

        if (is_countable($user) == 0)
        {
          $password = password_hash($password, PASSWORD_DEFAULT);
          $mysqli->query("INSERT INTO `users` (`user_login`, `user_name`, `user_email`, `user_password`, `user_hash`) VALUES ('$login', '$name', '$email', '$password', '$hash')");
          $mysqli->close();

          $output = [
            'message' => "Регистрация прошла успешно!",
            'status' => true
          ];

          exit(json_encode($output));
        }
        else {
          $output = [
            'message' => "Такой логин уже занят!",
            'status' => false
        ];
          exit(json_encode($output));
        }
      }
      else
      {
        $output = [
          'message' => "Пароли не совпадают!",
          'status' => false
      ];
        exit(json_encode($output));
      }
      break;

    case 'auth':
      $login = $_POST["login"];
      $verify = $mysqli -> query("SELECT * FROM `users` WHERE `user_login` = '$login'");
      $user = $verify -> fetch_assoc();
      if(is_countable($user) == 0){

        $output = [
          'login' => $login,
          'message' => "Такого пользователя не найдено!",
          'status' => false
      ];

        exit(json_encode($output));
      }

      $password = $_POST["password"] . $user['user_hash'];

      if (password_verify($password, $user['user_password'])) {
        $_SESSION['user'] = [
          "id_user" => $user['id_user'],
          "id_groups" => $user['id_groups'],
          "user_login" => $user['user_login'],
          "user_name" => $user['user_name'],
          "user_email" => $user['user_email']
        ];

        $output = [
          'login' => $login,
          'message' => "Авторизация прошла успешно!",
          'status' => true
      ];

      exit(json_encode($output));

      }
      else {

        $output = [
          'login' => $login,
          'message' => "Неправильно введён пароль!",
          'status' => false
      ];

        exit(json_encode($output));

      }
      $mysqli->close();
     break;

     case 'feedback':
       $name = $_POST["name"];
       $email = $_POST["email"];
       $text= $_POST["user_text"];
       $bool = 0;


       $mysqli->query("INSERT INTO `feedback` (`name`, `email`, `text`, `complete`) VALUES ('$name', '$email', '$text', '$bool')");

       $output = [
         'message' => "Ваше сообщение отправлено!"
     ];

       exit(json_encode($output));

       $mysqli->close();
     break;

     case 'create_order':
       $id_product = $_POST["id_product"];
       $username = $_POST["username"];
       $userlogin = $_POST["user_login"];
       $address = $_POST["address"];
       $address_2 = $_POST["address_2"];
       $email = $_POST["email"];
       $country = $_POST["country"];
       $state = $_POST["state"];
       $zip = $_POST["zip"];

       $mysqli->query("INSERT INTO `orders` (`id_product`, `username`, `userlogin`, `email`, `address`, `address_2`, `country`, `state`, `zip`) VALUES ('$id_product', '$username', '$userlogin', '$email', '$address', '$address_2', '$country', '$state', '$zip')");

       $output = [
         'message' => "Ваш заказ отправлен на подтверждение!"
     ];
     header("Location: http://oleg-stroi.ru/");
     echo '<script language="javascript">';
     echo 'alert("Заказ оформлен!")';
     echo '</script>';


       $mysqli->close();

    default:
      // code...
      break;
  }


 ?>
