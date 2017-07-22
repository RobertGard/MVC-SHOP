<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Функция подключения файлов-контроллеров и функций-экшенов
function loadPage($db,$controlerName, $actionName,$idObject,$cartCntItems){
    $controler = $controlerName."Controller";
    $action = $actionName."Action";
    
    require_once PathPrefix.$controler.PathPostfix;
    echo $action($db,$idObject,$cartCntItems);
}

/**
 * Заносим данные из запроса к бд в массив
 * 
 * @param type $query - Запрос к бд
 * @return type
 */
function addInArray($query){
    //В этот массив заносим данные запроса
    $isArray = array();
    //цикл добавления данных в массив
    while($row = mysqli_fetch_assoc($query)){
        $isArray[] = $row;
    }
    return $isArray;
}

//Проверка значений (своеобразный дебагер)
function d($values,$farther = FALSE){
    if($farther){
        echo "Debug <br> <pre>";
        print_r ($values);
    } else {
        echo "Debug <br> <pre>";
        print_r ($values);
        exit();
    }
}

/**
 * Функция перенаправления
 * 
 * @param type $dir - куда перенаправить
 */
function redirect($dir = "/"){
    header('Location: '.$dir.'');
    exit;
}