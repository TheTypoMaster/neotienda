<?php /* Smarty version Smarty-3.1.19, created on 2015-02-17 22:22:11
         compiled from "/home/neoliam/public_html/tienda/admin1183/themes/default/template/controllers/cms_content/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66797133354e3fe5b9eae59-89507910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '366e32eac9a5f6b6bc0027af302f325184b9caa6' => 
    array (
      0 => '/home/neoliam/public_html/tienda/admin1183/themes/default/template/controllers/cms_content/content.tpl',
      1 => 1406835656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66797133354e3fe5b9eae59-89507910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_breadcrumb' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54e3fe5ba41075_36213348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3fe5ba41075_36213348')) {function content_54e3fe5ba41075_36213348($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['cms_breadcrumb']->value)) {?>
	<ul class="breadcrumb cat_bar">
		<?php echo $_smarty_tpl->tpl_vars['cms_breadcrumb']->value;?>

	</ul>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }} ?>
