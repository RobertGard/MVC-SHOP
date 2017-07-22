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