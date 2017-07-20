<?php
/**
 * Контроллер главной страницы
 * 
 */

//Подключение моделей
require_once '../models/CategoriesModel.php'; // Модель категорий
require_once '../models/ProductsModel.php'; // Модель продуктов

/**
 * Экшен вывод товаров на главной 
 * 
 * @param type $db - подключение к БД
 * @param type $idObject - id из адресной строки
 */
function indexAction($db,$idObject,$cartCntItems){
    //Получение родительских категорий с привязкой к дочерним
    $rsAllCat = getParentAndChildrenCat($db);
    
    //Получение последних 16 товаров и БД
    $rsProduct = getLastProduct($db,16);
    
    include_once '../views/default/index.php';
}
