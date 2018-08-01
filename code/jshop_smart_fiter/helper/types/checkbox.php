// function render, after $columns = (int)$this->params->ex_type;
$cid = JRequest::getInt("category_id");
/* after if ($columns > 1 && $count == $colCount) {
				$html .= '<div style="display:inline-block;vertical-align: top;width:'.(int)(100 / $columns).'%">';
			} */
if(preg_match('/mnf/',$name)){
			$db = JFactory::getDbo();
			$qr = $db->getQuery(true);
			$qr = $db->setQuery("SELECT count(*) as man FROM `#__jshopping_products` p LEFT JOIN `#__jshopping_products_to_categories` c ON (p.product_id=c.product_id) WHERE c.category_id='".$cid."' AND p.product_manufacturer_id = '".$opt->value."' AND p.product_publish='1'");
			$mans = $db->loadObjectList();
			foreach($mans as $manuf){
			$man = ' ('.$manuf->man.')';
			}
			}
//instead .'</span>' set
.$man.'</span>'
//.'</label>';
