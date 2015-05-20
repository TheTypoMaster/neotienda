<?php /* Smarty version Smarty-3.1.19, created on 2015-05-19 22:35:37
         compiled from "C:\wamp\www\neotienda\admin1183\themes\default\template\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31875555bfa01588406-45227719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bccc49988badeceb658cbaabf96dd7972dc66932' => 
    array (
      0 => 'C:\\wamp\\www\\neotienda\\admin1183\\themes\\default\\template\\content.tpl',
      1 => 1429404027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31875555bfa01588406-45227719',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_555bfa015b3391_81898286',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555bfa015b3391_81898286')) {function content_555bfa015b3391_81898286($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
