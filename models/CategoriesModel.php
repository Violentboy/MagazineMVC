<?php
    /**
     * Модель для таблицы категорий(categories)
     * 
     */

    //>{* /CategoriesModel.php *} 
function getAllMainCatsWithChildren() {
    $sql = "SELECT * FROM `categories` WHERE `parent_id` = 0";
    $rs  = db()->query($sql);
    $smartyRs = array();
    while ($row = $rs->fetch_assoc()){
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

//<
