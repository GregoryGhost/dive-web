<?php
$host ="127.0.0.1";
$user = "root";
$password = "qwerty1234";
$dbName = "dota_live";

$link = mysqli_connect($host, $user, $password, $dbName);

/* проверяем соединение */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s<br>", mysqli_connect_error());
    exit();
}
else{
	printf("Connect success<br>");
}
if (!mysqli_set_charset($link, "utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s<br>", mysqli_error($link));
} else {
    printf("Текущий набор символов: %s<br>", mysqli_character_set_name($link));
}

?>
