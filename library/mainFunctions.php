<?php

//Создаем функцию автозагрузки нужной нам страницы
function loadPage($controllerName, $actionName = 'index') {
    //Подключаем контроллер
    include_once PathPrefix . $controllerName . PathPostfix;
    //Формируем название функции
    $function = $actionName . 'Action';
    $function();
}
