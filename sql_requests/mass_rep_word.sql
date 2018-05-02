UPDATE `table` SET column_name = REPLACE(column_name, 'old word', 'new word') WHERE column_name LIKE "%another word%";
/* EXAMPLE */
UPDATE `oc_product_tab_content` a INNER JOIN `oc_product` b ON (a.product_id = b.product_id) SET a.content = 'text' WHERE a.product_id=b.product_id AND b.manufacturer_id = '54' AND a.tab_id='5';
/* Mass replacement of the word in row*/
