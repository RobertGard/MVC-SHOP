<?php
/**
 * Контроллер главной страницы
 * 
 */

//Подключение моделей
include_once '../models/CategoriesModel.php';

function indexAction($db,$idObject){
    $rsAllCat = getParentAndChildrenCat($db);
    
    include_once '../views/default/index.php';
}
