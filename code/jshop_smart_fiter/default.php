//after tag </form>
<script type="text/javascript">
jQuery('.sf_form fieldset.sf_block').each(function(){
if(jQuery(this).find('label').length == 1){jQuery(this).remove();}
jQuery(this).find('.sf_block_params').find('input').each(function(){
if(jQuery('#id_'+jQuery(this).val()).length == 1 && jQuery('#id_'+jQuery(this).val()).val() != 0){
jQuery(this).closest('label').append('('+jQuery('#id_'+jQuery(this).val()).val()+')');
}
});
});
</script>
