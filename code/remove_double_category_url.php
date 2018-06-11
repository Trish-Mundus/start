print $this->_tmp_category_html_start;
//after
$document = JFactory::getDocument();
$docstart = JRequest::getInt('start',0);
$docroute = rtrim(JURI::root(), '/').JRoute::_('index.php?option=com_jshopping&controller=category&task=view&category_id=' . $this->category->category_id . '');
$act = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$end = end(explode('.html', $act));
$true = $docroute.$end;
if($docstart > 0) { 
$document->addHeadLink($docroute, 'canonical', 'rel', '');
}
if($act!=$true){
header("Location:".$true);
}
