<?php /* Smarty version Smarty-3.1.19, created on 2015-02-15 21:51:39
         compiled from "/home/neoliam/public_html/tienda/modules/blockcategories/views/blockcategories_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74963111654e15433b30915-29390593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65caa8cf18434d8d9f18732ae378c11b606ffb95' => 
    array (
      0 => '/home/neoliam/public_html/tienda/modules/blockcategories/views/blockcategories_admin.tpl',
      1 => 1423664732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74963111654e15433b30915-29390593',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'helper' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54e15433b40f24_06820571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e15433b40f24_06820571')) {function content_54e15433b40f24_06820571($_smarty_tpl) {?>
<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip" data-html="true" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'You can upload a maximum of 3 images.','mod'=>'blockcategories'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Thumbnails','mod'=>'blockcategories'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-4">
		<?php echo $_smarty_tpl->tpl_vars['helper']->value;?>

	</div>
</div>
<?php }} ?>
