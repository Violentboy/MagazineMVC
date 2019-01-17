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