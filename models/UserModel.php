<?php

/* 
 * Модель работы с таблицей `users`
 */

/**
 * Проверка данных для регистрации
 * 
 * @param type $db - подключение к БД
 * @param type $email - введенный email 
 * @param type $password1 - введенный первый пароль
 * @param type $password2 - введенный второй пароль
 */
function checkDataSignIn($db,$email,$password1,$password2){
    $key = array();
    $key['success'] = TRUE;
    
    //Проверка на существование email
    $sql = 'SELECT * FROM `users` WHERE `email` = "'.$email.'"';
    //Запрос к бд
    $query = mysqli_query($db, $sql);
    //Получение данных с запросы в виде массива
    $row = mysqli_fetch_assoc($query);
    //Если в массиве $row есть данные для ключа  email, значит 
    // запрос был выпонен успешно и данный с таким email уже есть в БД
    if(!empty($row['email'])){//Проверка на существование email
        $key['success'] = FALSE;
        $key['message'] = "Данный email уже зарегестрирован !";
    }elseif ($email==NULL) { //Введён ли email
        $key['success'] = FALSE;
        $key['message'] = "Введите email !";
    }elseif ($password1==NULL) {//Введён ли первый пароль
        $key['success'] = FALSE;
        $key['message'] = "Введите первый пароль !";
    }elseif ($password2==NULL) {//Введён ли второй пароль
        $key['success'] = FALSE;
        $key['message'] = "Введите второй пароль !";
    }elseif ($password1 !== $password2) {//Проверка на совпадение паролей
        $key['success'] = FALSE;
        $key['message'] = "Пароли не совпадают !";
    }
    
    return $key;
}

/**
 * Регистрация нового пользователя
 * 
 * @param type $db - подключение к БД
 * @param type $email - email для регистрации
 * @param type $passwordMD5 - закэшированный пароль для регистрации
 */
function registerNewUser($db,$email,$passwordMD5,$phone,$name){
    $sql = 'INSERT INTO `users` (`email`,`password`,`phone`,`name`) '
            . 'VALUES ("'.$email.'", "'.$passwordMD5.'", "'.$phone.'", "'.$name.'")';
    $query = mysqli_query($db, $sql);
    
    if($query){
        $sql = 'SELECT * FROM `users` WHERE `email` = "'.$email.'" AND `password` = "'.$passwordMD5.'"';
        
        $query = mysqli_query($db, $sql);
        
        $rs = mysqli_fetch_assoc($query);
    } else {
        $rs = FALSE;
    }
    
    return $rs;
}

/**
 * Проверка введёных данных пользователем при входе 
 * 
 * @param type $db - подключение к БД
 * @param type $email - email для регистрации
 * @param type $passwordMD5 - закэшированный пароль для регистрации
 * @return type
 */
function checkOptionsFromSignIn($db,$email,$passwordMD5){
    //Переменная успеха
    $res['success'] = TRUE;
    
    //Запрос к бд на проверку существования пользователя
    $sql = 'SELECT * FROM `users` WHERE `email` = "'.$email.'" AND `password` = "'.$passwordMD5.'"';
    
    $query = mysqli_query($db,$sql);
    
    $key = mysqli_fetch_assoc($query);
    
    //Проверка введёных данных
    if(empty($email)){ //Введён ли email ?
        $res['success'] = FALSE;
        $res['message'] = "Введите email !";
    }elseif (empty($passwordMD5)) { //Введён ли password ?
        $res['success'] = FALSE;
        $res['message'] = "Введите пароль !";
    }elseif (!isset($key['email'])) { //Есть ли данный пользователь в БД ?
        $res['success'] = FALSE;
        $res['message'] = "Неправильный логин или пароль !";
    } else {//Если всё хорошо
        $res['success'] = TRUE;
        $res['fetch'] = $key;
    }
        
    return $res;
}

/**
 * Получение подробной информации о пользователе зная его id
 * 
 * @param type $db - подключение к БД
 * @param type $idUser
 */
function getDetailsUserById($db,$idUser){
    $sql = 'SELECT * FROM `users` WHERE `id` = "'.$idUser.'" LIMIT 1';
    $query = mysqli_query($db, $sql);
    
    return addInArray($query);
}

/**
 * Проверка данных пере update
 * 
 * @param type $db - подключение к БД
 * @param type $email - email Пользователя
 * @param type $newPass1 - новый пароль 1
 * @param type $newPass2 - новый пароль 2
 * @param type $oldPassMD5 - старый пароль
 */
function checkDetailsUpdateData($db,$emailUser,$newPass1,$newPass2,$oldPassMD5){
    $res['success'] = TRUE;
    
    $sql = 'SELECT * FROM `users` WHERE `email` = "'.$emailUser.'" AND `password` = "'.$oldPassMD5.'" LIMIT 1';
    $query = mysqli_query($db,$sql);
    $key = mysqli_fetch_assoc($query);
    
    if(!isset($key['email'])){ // Проверка на правильность паролей
        $res['success'] = FALSE;
        $res['message'] = "Старый пароль не верен !";
     } elseif($newPass1 !== $newPass2) {//Проверка на совпадение паролей
        $res['success'] = FALSE;
        $res['message'] = "Пароли не совпадают !"; 
     }
    
     return $res;
    
}

/**
 * Изменение данных пользователя
 * 
 * @param type $db - подключение к БД
 * @param type $newPassMD5 - новый пароль в MD5
 * @param type $name - новое имя 
 * @param type $phone - новый телефон
 */
function updateUserData($db,$emailUser,$newPassMD5,$name,$phone){
    //Запрос на обновление данных пользователя
    $sql = 'UPDATE `users` SET '
            . '`password` = "'.$newPassMD5.'",'
            . '`phone` = "'.$phone.'",'
            . '`name` = "'.$name.'"'
            . ' WHERE `email` = "'.$emailUser.'"';
    
    $query = mysqli_query($db, $sql);
    
    if($query){
        $sql = 'SELECT * FROM `users` WHERE `email` = "'.$emailUser.'" AND `password` = "'.$newPassMD5.'" LIMIT 1';
        $query = mysqli_query($db, $sql);
        
        return mysqli_fetch_assoc($query);
    }
    
    
    
}