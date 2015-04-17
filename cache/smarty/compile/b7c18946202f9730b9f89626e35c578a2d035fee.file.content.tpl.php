<?php /* Smarty version Smarty-3.1.19, created on 2015-02-15 21:28:57
         compiled from "/home/neoliam/public_html/tienda/admin1183/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203270452654e14ee19ee936-81828852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7c18946202f9730b9f89626e35c578a2d035fee' => 
    array (
      0 => '/home/neoliam/public_html/tienda/admin1183/themes/default/template/content.tpl',
      1 => 1406835656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203270452654e14ee19ee936-81828852',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54e14ee19ffaa3_08332710',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e14ee19ffaa3_08332710')) {function content_54e14ee19ffaa3_08332710($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
