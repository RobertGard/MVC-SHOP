<?php
/**
 * html/index.php
 * Подключение главных функций и определение контролера и их action-функций
 */
    //Подключение главных функций и настроек 
    include_once '../config/config.php';
    include_once '../config/db.php';
    include_once '../library/mainFunction.php';

    //<-- Получение данных из адресной строки 
    $controlerName = isset($_GET['controller']) ? ucfirst($_GET['controller']): "Index";
  
    $actionName = isset($_GET['action']) ? $_GET['action'] : "index";
  
    $idObject = isset($_GET['id']) ? intval($_GET['id']) : NULL;
    // данных из адресной строки получены-->
  
    loadPage($db,$controlerName, $actionName,$idObject);
