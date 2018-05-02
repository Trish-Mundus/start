SELECT * FROM db WHERE id NOT IN (110, 109, 2);
/* EXAMPLE */
SELECT p.product_id, pd.category_id, p.name, pf.image FROM oc_product_description p LEFT JOIN oc_product_to_category pd ON (p.product_id = pd.product_id) LEFT JOIN oc_product pf ON (p.product_id = pf.product_id) WHERE pd.category_id NOT IN (110, 2, 109) AND pd.main_category = 0  AND pf.status = '1' AND pf.quantity > '0' LIMIT 4
/* selecting rows where id != 110 or 109 or 2, ect */
