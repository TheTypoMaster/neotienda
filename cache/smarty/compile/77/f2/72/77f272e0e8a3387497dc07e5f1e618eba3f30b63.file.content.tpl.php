<?php /* Smarty version Smarty-3.1.19, created on 2015-04-19 14:49:04
         compiled from "C:\wamp\www\tienda\admin1183\themes\default\template\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115065533ffa814f082-06138053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77f272e0e8a3387497dc07e5f1e618eba3f30b63' => 
    array (
      0 => 'C:\\wamp\\www\\tienda\\admin1183\\themes\\default\\template\\content.tpl',
      1 => 1429404027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115065533ffa814f082-06138053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5533ffa8185b99_93406034',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5533ffa8185b99_93406034')) {function content_5533ffa8185b99_93406034($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
