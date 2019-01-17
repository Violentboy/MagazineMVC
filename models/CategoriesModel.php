<?php
    /**
     * Модель для таблицы категорий(categories)
     * 
     */

/**
     * Получить дочерние категории для категории $catId
     * 
     * @param integer $catId ID категории
     * @return array массив категорий
     */
function getChildrenForCat($catId){
    $sql = "SELECT *
            FROM categories 
            WHERE parent_id = '{$catId}'";
            
    $rs = db()->query($sql);
    return createSmartyRsArray($rs);
}


    /**
     * Получить главные категории с привязками дочерних
     * 
     * @return array массив категорий
     */
function getAllMainCatsWithChildren() {
    $sql = "SELECT *
            FROM
            categories
            WHERE parent_id = 0";
    $rs  = db()->query($sql);
    $smartyRs = array();
    while ($row = $rs->fetch_assoc()){
        
        $rsChildren = getChildrenForCat($row['id']);
        if ($rsChildren){
            $row['children'] = $rsChildren;
        }
        
        $smartyRs[] = $row;
    }
    return $smartyRs;
}
