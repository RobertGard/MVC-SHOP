<?php

/* 
 * Подключение к базе данных
 */

//<==Данные для подключения
//
// Данные для подключения к БД
// $host - хост БД
//$database - название базы данных
// $user - логин пользователя базы данных
// $password - пароль пользователя базы данных
//
$host = 'localhost';
$user = 'root';
$password = '1997';
$database = 'dbshop';
//==>

$db = mysqli_connect($host, $user, $password, $database);

mysqli_set_charset($db,"utf8"); //Устанавливаем кодировку utf8

//Проверка подключения к БД
if(!$db){
    echo "Проблема подключения ".mysqli_connect_error();
}