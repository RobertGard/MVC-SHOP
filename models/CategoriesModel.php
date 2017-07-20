<?php

/* 
 * Модель получения категорий
 */

/**
 * Получить все категории 
 * 
 * @param type $db - инициализация подключения к БД
 * @return type
 */
function GetAllCategories($db){
    $sql = 'SELECT * FROM `categories` WHERE 1';
    
    $query = mysqli_query($db,$sql);
    
    return addInArray($query);
}

/**
 * Получение дочерних категорий по id  родителя
 * 
 * @param type $db - инициализация подключения к БД
 * @param type $parentId - id родительской категории
 * @return type
 */
function getChildrenByParentId($db,$parentId){
    $sql = 'SELECT * FROM `categories` WHERE `parent_id` = "'.$parentId.'"';
    
    $query = mysqli_query($db, $sql);
    
    return addInArray($query);
}

/**
 * Получение родительских категорий с привязкой к дочерним
 */
function getParentAndChildrenCat($db){
    $sql = 'SELECT * FROM `categories` WHERE `parent_id` = 0';
    $query = mysqli_query($db, $sql);
    //В этот массив заносим данные запроса
    $isArray = array();
    //цикл добавления данных в массив
    while ($row = mysqli_fetch_assoc($query)){
        $rs = getChildrenByParentId($db,$row['id']);
        if (isset($rs)){
            $row['children'] = $rs;
        }
       $isArray[] = $row;
    }
    return $isArray;
}

/**
 * Получение информации о категории по её id из БД
 * 
 * @param type $db - инициализация подключения к БД
 * @param type $idObject - id из адресной строки
 */
function getCatById($db,$idObject){
    $sql = 'SELECT * FROM `categories` WHERE `id` = "'.$idObject.'"';
    
    $query = mysqli_query($db, $sql);
    
    return mysqli_fetch_assoc($query);
}