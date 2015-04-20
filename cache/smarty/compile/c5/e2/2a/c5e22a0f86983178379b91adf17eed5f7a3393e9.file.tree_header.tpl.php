<?php /* Smarty version Smarty-3.1.19, created on 2015-04-19 15:31:13
         compiled from "C:\wamp\www\neotienda\admin1183\themes\default\template\helpers\tree\tree_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124695534098986dfd0-52958703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5e22a0f86983178379b91adf17eed5f7a3393e9' => 
    array (
      0 => 'C:\\wamp\\www\\neotienda\\admin1183\\themes\\default\\template\\helpers\\tree\\tree_header.tpl',
      1 => 1429404028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124695534098986dfd0-52958703',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'toolbar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_553409898c7d69_66816343',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553409898c7d69_66816343')) {function content_553409898c7d69_66816343($_smarty_tpl) {?>
<div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl);?>
<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {?><?php echo $_smarty_tpl->tpl_vars['toolbar']->value;?>
<?php }?>
</div><?php }} ?>
