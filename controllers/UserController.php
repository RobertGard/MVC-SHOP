<?php

/* 
 * Контроллер пользователей
 */

//Подключение моделей
require_once '../models/CategoriesModel.php'; // Модель категорий
require_once '../models/ProductsModel.php'; // Модель продуктов
require_once '../models/UserModel.php'; // Модель продуктов
/**
 * Регистрация пользователей
 * 
 * @param type $db - инициализация подключения к бд
 * @param type $idObject - id товара
 * @param type $cartCntItems - количество товаров в корзине
 */
function signupAction($db,$idObject,$cartCntItems){
    //Получение данных
    $email = isset($_REQUEST['emailSU']) ? $_REQUEST['emailSU'] : NULL;
    $password1 = isset($_REQUEST['passwordSU1']) ? $_REQUEST['passwordSU1'] : NULL;
    $passwordMD5 = md5($password1);
    $password2 = isset($_REQUEST['passwordSU2']) ? $_REQUEST['passwordSU2'] : NULL;
    
    $phone = isset($_REQUEST['phoneSU']) ? $_REQUEST['phoneSU'] : NULL;
    $name = isset($_REQUEST['nameSU']) ? $_REQUEST['nameSU'] : NULL;
    
    //Проверка данных для регистрации
    $key = checkDataSignIn($db,$email,$password1,$password2);
    
    $res = array();
    if($key['success'] == FALSE){//Если данные были введины не корректно, то вывводится message об ошибке
        $res['success'] = $key['success'];
        $res['message'] = $key['message'];
    } else {//иначе идёт регистрация нового пользователя и добавление его в $_SESSION['user']
        $successRegister = registerNewUser($db,$email,$passwordMD5,$phone,$name);
        if($successRegister !== FALSE){
            $_SESSION['user'] = $successRegister;
            
            //Отправка в ответ js
            $res['useremail'] = $successRegister['email'];
            $res['success'] = TRUE;
            $res['message'] = "Регистрация прошла успешно !";
        } else {
            $res['success'] = FALSE;
            $res['message'] = "Пробемы при регистрации пользователя !";
        }
    }
    return json_encode($res);
}

function signinAction($db,$idObject,$cartCntItems){
    //Получение введёного email для логинизации
    $email = isset($_REQUEST['emailSI']) ? $_REQUEST['emailSI'] : NULL;
    //Получение введёного password для логинизации    
    $password = isset($_REQUEST['passwordSI']) ? $_REQUEST['passwordSI'] : NULL;
    $passwordMD5 = md5($password);
    
    $key = checkOptionsFromSignIn($db,$email,$passwordMD5);
    
    if(!$key['success']){
        $res['success'] = $key['success'];
        $res['message'] = $key['message'];
    } else {
        $_SESSION['user'] = $key['fetch'];
        $res['success'] = $key['success'];
    }
    
    echo json_encode($res);
}


/**
 * Выход из сессии пользователя и корзины
 */
function exitAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    
    redirect();//Функция перенаправления
}