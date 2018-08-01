// after 
/*if ($cfg->b_comment) {
				JHtml::_("behavior.tooltip");
}*/
$db = JFactory::getDbo();
			$qr = $db->getQuery(true);
			$qr = $db->setQuery("SELECT `id` as opt FROM `#__jshopping_products_extra_field_values` WHERE `field_id` = '".$cfg->ex_field."'");
			$opts = $db->loadObjectList();
			foreach ($opts as $opt){
			$ex_field[] = array('el' => $opt->opt);
			$qr2 = $db->getQuery(true);
			$qr2 = $db->setQuery("SELECT count(*) as field FROM `#__jshopping_products` p LEFT JOIN `#__jshopping_products_to_categories` c ON (p.product_id=c.product_id) WHERE c.category_id='".$cid."' AND p.product_publish='1' AND p.extra_field_".$cfg->ex_field." LIKE '%".$opt->opt."%';");
			$counts = $db->loadObjectList();
			$html .= "<input type=\"hidden\" id=\"id_".$opt->opt."\"";
			foreach($counts as $cont){
			$count = $cont->field;
			$html .= "value=\"".$count."\"";
			}
			$html .= "/>";
			}
