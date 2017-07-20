<?php

/* 
 * Контроллер работы с карзиной
 */

/**
 * Добавление id товаров в сессию
 * 
 * @param type $db - инициализация подключения к бд
 * @param type $idObject - id товара
 */
function addtocartAction($db,$idObject,$cartCntItems){
    //Получение id товара
    $idProduct = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
    
    $rs = array();
    if(isset($_SESSION['cart']) && !in_array($idObject, $_SESSION['cart'])){
        $_SESSION['cart'][] = $idObject; 
        $rs['cntCartItem'] = $cartCntItems;
        $rs['success'] = TRUE;
    } else {
        $rs['success'] = FALSE;
        $rs['message'] = "Товар уже есть в корзине !";
    }
    echo json_encode($rs);
}

/**
 * Удаление id товара из сессии
 * 
 * @param type $db - инициализация подключения к бд
 * @param type $idObject - id товара
 * @param type $cartCntItems - количество товаров в корзине
 */
function removefromcartAction($db,$idObject,$cartCntItems){
    $idProduct = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
    
    $key = array_search($idProduct, $_SESSION['cart']);
    
    $res = array();
    if($key!==FALSE){
        unset($_SESSION['cart'][$key]);
        $res['success'] =TRUE;
        $res['cntCartItem'] = count($_SESSION['cart']);
    } else {
        $res['success'] = FALSE;
    }
    
    echo json_encode($res);
}