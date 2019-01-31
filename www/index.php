<?php
session_start(); // Стартуем сессию

// Если в сессии нет массива корзины то создаем его
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

include_once '../config/config.php'; //Инициализация настроек
include_once '../config/db.php'; // Подключение к БД
include_once '../library/mainFunctions.php'; //Основные функции

//Определяем с каким контроллером будем работать
$controllerName = filter_input(INPUT_GET, 'controller') ? 
                  ucfirst(filter_input(INPUT_GET, 'controller')) : 'Index';

//Определяем с какой функцией будем работать
$actionName = filter_input(INPUT_GET, 'action') ? 
              filter_input(INPUT_GET, 'action') : 'Index';

$smarty->assign('CartCntItems', count($_SESSION['cart']));

//Вызов функции автозагрузки страницы
loadPage($smarty, $controllerName, $actionName);

