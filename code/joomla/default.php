<ul>
<?php
  foreach($categories_arr as $curr){
      $class = "jshop_menu_level_".$curr->level;
      if ($categories_id[$curr->level]==$curr->category_id) $class = $class."_a"; ?>
	 
   <?php if ($curr->level == 0)   { ?> 
   <li class = "<?php print $class?>" <?php if($module->position == 'catm') { echo 'id="p_',$curr->category_id,'"'; } ?>>
            <a href = "<?php print $curr->category_link?>"><?php print $curr->name?>
                <?php if ($show_image && $curr->category_image){?>
                    <img align = "absmiddle" src = "<?php print $jshopConfig->image_category_live_path."/".$curr->category_image?>" alt = "<?php print $curr->name?>" />
                <?php } ?>
            </a>
			
			<?php if ($curr->level == -1)   { ?>
  <div style="display:none;" class = "c_<?php print $curr->level;?>"><a href = "<?php print $curr->category_link?>"><?php print $curr->name?>
                <?php if ($show_image && $curr->category_image){?>
                    <img align = "absmiddle" src = "<?php print $jshopConfig->image_category_live_path."/".$curr->category_image?>" alt = "<?php print $curr->name?>" />
                <?php } ?>
            </a></div>
   <?php } ?>
      </li>
<?php } ?>
 <?php } ?>
 </ul>
 <?php if($module->position == 'catm') {?>
 <script>
 <?php 
 foreach($categories_arr as $curr) {?>
 <?php if ($curr->level == 1)   { ?>
 jQuery('#p_<?php print $curr->category_parent_id; ?>').append('<div class="child" id="c_<?php print $curr->category_id?>" style="top:-'+parseInt(jQuery('#p_<?php print $curr->category_parent_id; ?>').height()+8)+'px;"><a href="<?php print $curr->category_link?>"><?php print $curr->name;?></a></div>');
 jQuery('#catm #c_<?php print $curr->category_id; ?>').each(function(){jQuery(this).css('height',parseInt(jQuery(this).height()+17));});
 <?php } if ($curr->level == 2)   {?>
 jQuery('#c_<?php print $curr->category_parent_id; ?>').append('<div class="child2" style="top:-30px;"><a href="<?php print $curr->category_link?>"><?php print $curr->name;?></a></div>');
 <?php } ?>
 <?php } ?>
 jQuery(document).ready(function(){
 jQuery('#catm ul li').each(function(){jQuery(this).css('height',jQuery(this).height());});
 });
 </script>
  <?php } ?>
  <!-- jQuery adding hover function for ul main category, after for each li of main category .find('child').fadeIn()/fadeOut() and for each child category .find('child2').fadeIn()/fadeOut();
  Css - ul,li,.child,.child2{display:none; +styles on taste} !li{visibility:hidden;}-->
