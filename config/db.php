<?php

/**
 * 
 * Инициализация подключения к БД
 * 
 */
//>{* /db.php *} 
function db() {
    $dbHost = '127.0.0.1';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'myshop';
    $db     = new mysqli($dbHost, $dbUser, $dbPass, $dbName); //создаем объект
    $db->set_charset('utf8'); // задаем кодировку
    if ($db->connect_errno) {
        die('Не удалось подключится к MySQL.');
    } return $db;
}

//<