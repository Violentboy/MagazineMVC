<?php

/**
 * ProductController.php
 * 
 * Контроллер страницы товара (/product/1)
 * 
 */

// Подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Формирование страницы категории
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    
    // Получаем идентификатор продукта из параметра $_GET['id']
    $itemId = (filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT))  ?
            (filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)) : null;
    if ($itemId === null) {
        exit (); }
    
    // Получить данные продукта
    $rsProduct = getProductsById($itemId);

    // Получить все категории        
    $rsCategories = getAllMainCatsWithChildren();
        
    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
    
}