<?php
/**
 * html/index.php
 * Подключение главных функций и определение контролера и их action-функций
 */
    //Запускаем сессию
    session_start();
    
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    //Подключение главных функций и настроек 
    include_once '../config/config.php';
    include_once '../config/db.php';
    include_once '../library/mainFunction.php';

    //<-- Получение данных из адресной строки 
    $controlerName = isset($_GET['controller']) ? ucfirst($_GET['controller']): "Index";
  
    $actionName = isset($_GET['action']) ? $_GET['action'] : "index";
  
    $idObject = isset($_GET['id']) ? intval($_GET['id']) : NULL;
    // данных из адресной строки получены-->
    

    // Инициализация переменной отвечающей за вввод количества товаров в корзине
    $cartCntItems = count($_SESSION['cart']);


    loadPage($db,$controlerName, $actionName,$idObject,$cartCntItems);
    
    