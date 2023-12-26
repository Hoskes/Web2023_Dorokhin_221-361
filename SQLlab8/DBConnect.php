<?php
    define('DB_HOST', 'localhost'); //Адрес
    define('DB_USER', 'root'); //Имя пользователя
    define('DB_PASSWORD', 'root'); //Пароль
    define('DB_NAME', 'schema_name'); //Имя БД
    $mysql = null;
    try{
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }catch(Exception $e){
        echo 'not ok';
    }
?>