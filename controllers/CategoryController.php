<?php
/**
 * CategoryController.php
 * 
 * Контроллер страницы категории (/category/1)
 * 
 */

// Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование страницы категории
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    $catId = (filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT))  ?
            (filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)) : null;
    if ($catId === null) { exit ();}
    $rsProducts = null;
    $rsChildCats = null;
    $rsCategory = getCatById($catId);
    // Если главная категория то показываем дочерние категории,
    // иначе показываем товары
    if ($rsCategory['parent_id'] == 0){
        $rsChildCats = getChildrenForCat($catId);
    } else {
        $rsProducts = getProductsByCat($catId); 
    }
    
    $rsCategories = getAllMainCatsWithChildren();
    
    $smarty->assign('pageTitle', 'Товары категории' . $rsCategory['name']);
    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCats', $rsChildCats);
    $smarty->assign('rsCategories', $rsCategories);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
    
}