SELECT * FROM `jbghl_jshopping_products` AS prod 
LEFT JOIN `jbghl_jshopping_products_to_categories` AS pr_cat ON pr_cat.product_id = prod.product_id 
LEFT JOIN `jbghl_jshopping_categories` AS cat ON pr_cat.category_id = cat.category_id 
LEFT JOIN `jbghl_jshopping_products_to_wishboxcategories` as prodw ON prodw.product_id = prod.product_id JOIN (SELECT * FROM `jbghl_jshopping_wishboxcategories`) wish ON wish.wishboxcategory_id = prodw.wishboxcategory_id 
WHERE prod.product_publish=1 AND cat.category_publish=1 AND wish.name_ru-RU LIKE '%".$word."%' GROUP BY prod.product_id
/*OR*/
SELECT * FROM `jbghl_jshopping_products` AS prod
LEFT JOIN `jbghl_jshopping_products_to_categories` AS pr_cat ON pr_cat.product_id = prod.product_id
LEFT JOIN `jbghl_jshopping_categories` AS cat ON pr_cat.category_id = cat.category_id
LEFT JOIN `jbghl_jshopping_products_to_wishboxcategories` as prodw ON prodw.product_id = prod.product_id 
LEFT JOIN `jbghl_jshopping_wishboxcategories` as wish ON wish.wishboxcategory_id = prodw.wishboxcategory_id
WHERE prod.product_publish=1 AND cat.category_publish=1 AND wish.name_ru-RU LIKE '%".$word."%' GROUP BY prod.product_id
