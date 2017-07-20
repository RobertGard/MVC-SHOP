<?php

/* 
 * Работа с таблицей `products`
 */

/**
 * Получение последних 16 товаров и БД
 * 
 * @param type $db- инициализация подключения к БД
 * @param type $sum - количество выводимых товаров
 * @return type
 */
function getLastProduct($db,$sum){
    $sql = 'SELECT * FROM `products` ORDER BY `id` DESC LIMIT '.$sum;
    
    $query = mysqli_query($db, $sql);
    
    return addInArray($query);
}

/**
 * /Получение товаров по id категорий , к которым они привязаны
 * 
 * @param type $db - подключение к БД
 * @param type $idObject - id из адресной строки
 */
function getProductByCat($db,$idObject){
    $sql = 'SELECT * FROM `products` WHERE `category_id` = "'.$idObject.'" ORDER BY `id` DESC';
    
    $query = mysqli_query($db, $sql);
    
    return addInArray($query);
}

/**
 *Получение всех товаров из бд
 * 
 * @param type $db - подключение к БД
 * @return type
 */
function getAllProduct($db){
    $sql = 'SELECT * FROM `products` ORDER BY `id` DESC';
    
    $query = mysqli_query($db, $sql);
    
    return addInArray($query);
}

/**
 * Получение подробной информации о товаре 
 * 
 * @param type $db - подключение к БД
 * @param type $idObject - id из адресной строки
 */
function getProductById($db,$idObject){
    $sql = 'SELECT * FROM `products` WHERE `id` = "'.$idObject.'"';
    $query = mysqli_query($db, $sql);
    
    return addInArray($query);
}