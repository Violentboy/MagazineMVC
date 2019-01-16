<?php
/**
 * Контроллер главной страницы
 * 
 */

// Подключаем модели
include_once '../models/CategoriesModel.php';

    function testAction() {
        echo 'IndexContoller.php > testAction';
    }
    
/**
 * Формирование главной страницы сайта
 * 
 * @param object $smarty шаблонизатор
 */
    
    function indexAction($smarty){
        
        $rsCategories = getAllMainCatsWithChildren();
        
        // assign() — назначает значение шаблону
        $smarty->assign('pageTitle', 'Главная страница сайта');
        
        $smarty->assign('rsCategories', $rsCategories);
 
        loadTemplate($smarty, 'index');
    }
