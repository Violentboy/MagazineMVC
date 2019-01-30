<?php
/**
 * Модель для таблицы продукции (products)
 * 
 */


function getLastProducts ($limit = null){
    $sql = "SELECT *
            FROM products 
            ORDER BY id DESC";
    
    if ($limit){
        $sql .= " LIMIT {$limit}";
    }

    $rs = db()->query($sql);
    return createSmartyRsArray($rs);
}


/**
 * Получить продукты для категории $itemId
 * 
 * @param integer $itemId ID категории
 * @return array массив продуктов
 */
function getProductsByCat($itemId){
    $itemId = intval($itemId); //intval - преобразует в тип integer, защита от Sql-инъекций
    $sql = "SELECT *
            FROM products 
            WHERE category_id = '{$itemId}'";
    $rs = db()->query($sql);
    return createSmartyRsArray($rs);
}


/**
 * Получить данные продукта по ID
 * 
 * @param integer $itemId ID продукта
 * @return array массив данных продукта
 */
function getProductsById($itemId){
    $itemId = intval($itemId); //intval - преобразует в тип integer, защита от Sql-инъекций       
    $sql = "SELECT *
            FROM products 
            WHERE id = '{$itemId}'";       
    $rs = db()->query($sql);
    return createSmartyRsArray($rs);
}
