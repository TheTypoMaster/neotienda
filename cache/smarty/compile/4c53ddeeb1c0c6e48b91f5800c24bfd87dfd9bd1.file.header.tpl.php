<?php /* Smarty version Smarty-3.1.19, created on 2015-02-16 00:42:22
         compiled from "/home/neoliam/public_html/tienda/modules/yotpo/views/templates/front/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204060705954e17c369b2147-69376356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c53ddeeb1c0c6e48b91f5800c24bfd87dfd9bd1' => 
    array (
      0 => '/home/neoliam/public_html/tienda/modules/yotpo/views/templates/front/header.tpl',
      1 => 1424063327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204060705954e17c369b2147-69376356',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'yotpoAppkey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54e17c369f2e78_49725901',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e17c369f2e78_49725901')) {function content_54e17c369f2e78_49725901($_smarty_tpl) {?><script type="text/javascript">
	   var yotpoAppkey = "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpoAppkey']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" ;
	
	function inIframe () {
	    try {
	    	return window.self !== window.top;
	    } catch (e) {
	    	return true;
	    }
	}
	var inIframe = inIframe();
	if (inIframe) {
		window['yotpo_testimonials_active'] = true;
	}
	if (document.addEventListener){
	    document.addEventListener('DOMContentLoaded', function () {
	        var e=document.createElement("script");e.type="text/javascript",e.async=true,e.src="//staticw2.yotpo.com/" + yotpoAppkey  + "/widget.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)
	    });
	}
	else if (document.attachEvent) {
	    document.attachEvent('DOMContentLoaded',function(){
	        var e=document.createElement("script");e.type="text/javascript",e.async=true,e.src="//staticw2.yotpo.com/" + yotpoAppkey  + "/widget.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)
	    });
	}
	
</script><?php }} ?>
