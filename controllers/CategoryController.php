<?php

/* 
 * Контроллер категорий
 */

//Подключение моделей
require_once '../models/CategoriesModel.php'; // Модель категорий
require_once '../models/ProductsModel.php'; // Модель продуктов


function indexAction($db,$idObject){
//Получение родительских категорий с привязкой к дочерним
$rsAllCat = getParentAndChildrenCat($db);

//Получение всех товаров из бд
$allProduct = getAllProduct($db);

$CatById = getCatById($db,$idObject);
    
    if($CatById['parent_id']==0){
        //Получение дочерней категори по id родителя
        $rsChildrenByParentCat = getChildrenByParentId($db,$CatById['id']);
        include_once '../views/default/category.php';
    } else {
        //Получение товаров по id категорий , к которым они привязаны
        $rsProduct = getProductByCat($db,$idObject);
        include_once '../views/default/index.php';
    }
}
