<?php /* Smarty version Smarty-3.1.19, created on 2015-04-19 14:48:44
         compiled from "C:\wamp\www\tienda\admin1183\themes\default\template\helpers\modules_list\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42855533ff94f121b0-57056348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20f797867d004a4a126a992736785cdd2ef137b3' => 
    array (
      0 => 'C:\\wamp\\www\\tienda\\admin1183\\themes\\default\\template\\helpers\\modules_list\\modal.tpl',
      1 => 1429404028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42855533ff94f121b0-57056348',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5533ff94f1dd46_76876573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5533ff94f1dd46_76876573')) {function content_5533ff94f1dd46_76876573($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div><?php }} ?>
