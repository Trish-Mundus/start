<?php
class jShopCategoriesHelper{

function getTreeCats($order, $ordering, $category_id, $categories_id, &$categories, $level=0){
$cat = &JTable::getInstance('category', 'jshop');
$cat->category_parent_id = 0;
$cats = $cat->getSisterCategories($order, $ordering);
foreach($cats as $key=>$value){
$cats[$key]->level = $level;
$categories[] = $value;
jShopCategoriesHelper::getTreeCats2($order, $ordering, $value->category_id, $categories_id, $categories, $level);
}
}
//Children categories level > 0
function getTreeCats2($order, $ordering, $category_id, $categories_id, &$categories, $level){
++$level;
$cat = &JTable::getInstance('category', 'jshop');
$cat->category_id = $category_id;
$cats = $cat->getChildCategories($order, $ordering);
foreach($cats as $key=>$value){
$cats[$key]->level = $level;
$categories[] = $value;
jShopCategoriesHelper::getTreeCats2($order, $ordering, $value->category_id, $categories_id, $categories, $level);
}
}
 
  public static function getCatsArray($order, $ordering, $category_id, $categories_id = array()){
       $res_arr = array();
       jShopCategoriesHelper::getTreeCats($order, $ordering, $category_id, $categories_id, $res_arr, 0);
       return $res_arr;
    } 

    
}
?>
