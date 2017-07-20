<?php

/* 
 * Контроллер товаров
 */

//Подключение моделей
require_once '../models/CategoriesModel.php'; // Модель категорий
require_once '../models/ProductsModel.php'; // Модель продуктов

/**
 * Вывод подробной информации о товаре
 * 
 * @param type $db
 * @param type $idObject
 */
function indexAction($db,$idObject){
//Получение родительских категорий с привязкой к дочерним
$rsAllCat = getParentAndChildrenCat($db);
    
//Получение всех товаров из бд
$allProduct = getAllProduct($db);

//Получение подробной информации о товаре по его id
$detailProduct = getProductById($db,$idObject);

include_once '../views/default/product.php';
}