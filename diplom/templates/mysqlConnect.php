<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$BDname = "oleg_stroi";

$mysqli = new mysqli($servername, $username, $password, $BDname);

if ($mysqli -> connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli -> connect_error);
    exit();
};

function str_rand(int $length = 64){
  $length = ($length < 4) ? 4 : $length;
  return bin2hex(random_bytes(($length-($length%2))/2));
}

mysqli_set_charset($mysqli, "utf8");
