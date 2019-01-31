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
    $itemId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?
              filter_input(INPUT_GET, 'id') : null;
    if (!$itemId) {return false;}
    
    // Получить данные продукта
    $rsProduct = getProductById($itemId);

    // Получить все категории        
    $rsCategories = getAllMainCatsWithChildren();
    
    $smarty->assign('itemInCart', 0);
    if (in_array($itemId, $_SESSION['cart'])){
        $smarty->assign('itemInCart', 1);
    }
        
    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
    
}