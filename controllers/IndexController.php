<?php
/**
 * Контроллер главной страницы
 * 
 */

// Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

    function testAction() {
        echo 'IndexController.php > testAction';
    }
    
/**
 * Формирование главной страницы сайта
 * 
 * @param object $smarty шаблонизатор
 */
    
    function indexAction($smarty){
        
        $rsCategories = getAllMainCatsWithChildren();
        $rsProducts = getLastProducts(16);
        
        // assign() — назначает значение шаблону
        $smarty->assign('pageTitle', 'Главная страница сайта');
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProducts', $rsProducts);
 
        loadTemplate($smarty, 'index');
    }
