<?php
/**
 * Контроллер главной страницы
 * 
 */

    function testAction() {
        echo 'IndexContoller.php > testAction';
    }
    
/**
 * Формирование главной страницы сайта
 * 
 * @param object $smarty шаблонизатор
 */
    
    function indexAction($smarty){
        $smarty->assign('pageTitle', 'Главная страница сайта');
        
        loadTemplate($smarty, 'index');
    }
