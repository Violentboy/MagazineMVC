<?php

/**
 * CartController.php
 * 
 * Контроллер работы с корзиной (/cart/)
 * 
 */

// Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Добавление продукта в корзину
 * 
 * @param integer id GET параметр - ID добавляемого продукта
 * @return json информация об операции (успех, кол-во элементов в корзине)
 */
function addtocartAction(){
    $itemId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?
              filter_input(INPUT_GET, 'id') : null;
    if (!$itemId) {return false;} 
    $resData = [];
    // Если значение не найдено, то добавляем
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    
    // Передаем данные массива php в json данные
    echo json_encode($resData);
}

/**
 * Удаления продукта из корзины
 * 
 * @param integer id GET параметр - ID удаляемого из корзины продукта
 * @return json информация об операции (успех, кол-во элементов в корзине)
 */
function removefromcartAction(){
    $itemId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?
              filter_input(INPUT_GET, 'id') : null;
    if (!$itemId) {return false;} 
    $resData = [];
    $key = array_search($itemId, $_SESSION['cart']);
    // Если значение не найдено, то добавляем
    if ($key !== false){
        unset ($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }
    
    // Передаем данные массива php в json данные
    echo json_encode($resData);
}

/**
 * Формирование страницы корзины
 * @link /cart/
 */
function indexAction($smarty){
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    
    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemsIds);
    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

