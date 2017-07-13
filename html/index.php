<?php
/**
 * html/index.php
 * Подключение главных функций и определение контролера и их action-функций
 */
    session_start(); //Стартует сессия

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }


    include_once '../config/config.php';    //Инициализация настроек
    include_once '../config/db.php'; //Подключение и инициализация базы данных mysgl
    include_once '../library/mainFunctions.php';    //Подключение главных функций
		//Выясняем название контролера из адресной строки и присваиваем пеменной $controllerName
	if(isset($_GET['controller'])){
		$controllerName = ucfirst($_GET['controller']);
	}else{	// По умолчанию будет :
        $controllerName = "Index";
	}
		//Выясняем название экшена из адресной строки и присваиваем пеменной $actionName
	if(isset($_GET['action'])){
		$actionName = $_GET['action'];
	}else{	// По умолчанию будет :
        $actionName = "index";
	}
        
        // Получение из адресной id объекта (вывод id в адрес. строку прописывается в ссылках )
        if(isset($_GET['id'])){
            $objectId = intval($_GET['id']);
        }else{
            $objectId = NULL;
        }
        
        // Инициализация сесиии пользователя 
        if(isset($_SESSION['user'])){
            $SessionUser = $_SESSION['user'];
        }
        // Инициализация переменной отвечающей за вввод количества товаров в корзине
        $cartCntItems = count($_SESSION['cart']);

	// Вызывается и выводится функция загрузк файла-контроллера из library/mainFunctions.php
    echo loadPage($db,$SessionUser,$objectId,$cartCntItems,$controllerName,$actionName);
