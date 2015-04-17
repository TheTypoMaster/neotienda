<?php /* Smarty version Smarty-3.1.19, created on 2015-02-16 00:42:46
         compiled from "/home/neoliam/public_html/tienda/modules/yotpo/views/templates/front/widgetDiv2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187066314354e17c4e71fb74-09656222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68df7f193e7d20c64d5ddffcdc71ba6a8eeeb701' => 
    array (
      0 => '/home/neoliam/public_html/tienda/modules/yotpo/views/templates/front/widgetDiv2.tpl',
      1 => 1424063327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187066314354e17c4e71fb74-09656222',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'yotpoProductId' => 0,
    'yotpoProductName' => 0,
    'yotpoProductLink' => 0,
    'yotpoProductImageUrl' => 0,
    'yotpoProductDescription' => 0,
    'yotpoLanguage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54e17c4e865342_37692552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e17c4e865342_37692552')) {function content_54e17c4e865342_37692552($_smarty_tpl) {?><div class="yotpo yotpo-main-widget"
   data-product-id="<?php echo intval($_smarty_tpl->tpl_vars['yotpoProductId']->value);?>
"
   data-name="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpoProductName']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" 
   data-url="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpoProductLink']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" 
   data-image-url="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpoProductImageUrl']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" 
   data-description="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpoProductDescription']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" 
   data-lang="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpoLanguage']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
</div>


 <?php }} ?>
