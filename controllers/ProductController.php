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
function indexAction($db,$idObject,$cartCntItems){
//Получение родительских категорий с привязкой к дочерним
$rsAllCat = getParentAndChildrenCat($db);

//Получение подробной информации о товаре по его id
$detailProduct = getProductById($db,$idObject);

//Проверяем , есть ли товар в корзине
$key = in_array($idObject, $_SESSION['cart']);

include_once '../views/default/product.php';
}