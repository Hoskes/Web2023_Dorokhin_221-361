<?php
$db_host = 'localhost';
$db_user = 'root'; //имя пользователя совпадает с именем БД
$db_password = 'root'; //пароль, указанный при создании БД
$database = 'device'; //имя БД, которое было указано при создании
$mysql = mysqli_connect($db_host, $db_user, $db_password, $database);
if($mysql==null){
    echo "Ошибка подключения";
}
?>