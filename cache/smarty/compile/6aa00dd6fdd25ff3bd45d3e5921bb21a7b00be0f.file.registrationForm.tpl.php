<?php /* Smarty version Smarty-3.1.19, created on 2015-02-16 00:38:50
         compiled from "/home/neoliam/public_html/tienda/modules/yotpo/views/templates/admin/registrationForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40471705454e17b6270f086-37352249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aa00dd6fdd25ff3bd45d3e5921bb21a7b00be0f' => 
    array (
      0 => '/home/neoliam/public_html/tienda/modules/yotpo/views/templates/admin/registrationForm.tpl',
      1 => 1424063327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40471705454e17b6270f086-37352249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'yotpo_action' => 0,
    'yotpo_email' => 0,
    'yotpo_userName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54e17b629eb2d5_08768161',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e17b629eb2d5_08768161')) {function content_54e17b629eb2d5_08768161($_smarty_tpl) {?><div class="y-wrapper">
	<div class="y-side-box">
		<div class="y-side-header"><?php echo smartyTranslate(array('s'=>'Yotpo makes it easy to generate beautiful reviews for your products. These in turn lead to higher sales and happier customers.','mod'=>'yotpo'),$_smarty_tpl);?>
</div>
		<hr />
		<div class="row-fluid y-features-list text-shadow">
			<ul>
				<li><i class="y-side-icon conversation-rate"></i><?php echo smartyTranslate(array('s'=>'Increase conversion rate','mod'=>'yotpo'),$_smarty_tpl);?>
</li>
				<li><i class="y-side-icon multi-languages"></i><?php echo smartyTranslate(array('s'=>'Multi languages','mod'=>'yotpo'),$_smarty_tpl);?>
</li>
				<li><i class="y-side-icon forever-free"></i><?php echo smartyTranslate(array('s'=>'Forever free','mod'=>'yotpo'),$_smarty_tpl);?>
</li>
				<li><i class="y-side-icon social-engagement"></i><?php echo smartyTranslate(array('s'=>'Increase social engagement','mod'=>'yotpo'),$_smarty_tpl);?>
</li>
				<li><i class="y-side-icon plug-play"></i><?php echo smartyTranslate(array('s'=>'Plug &amp; play installation','mod'=>'yotpo'),$_smarty_tpl);?>
</li>
				<li><i class="y-side-icon full-customization"></i><?php echo smartyTranslate(array('s'=>'Full customization','mod'=>'yotpo'),$_smarty_tpl);?>
</li>
				<li><i class="y-side-icon analytics"></i><?php echo smartyTranslate(array('s'=>'Advanced analytics','mod'=>'yotpo'),$_smarty_tpl);?>
</li>
				<li><i class="y-side-icon seo"></i><?php echo smartyTranslate(array('s'=>'SEO capabilities','mod'=>'yotpo'),$_smarty_tpl);?>
</li>
			</ul>
		</div>
	</div>
	<div class="y-white-box">
		<form action="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpo_action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post">
			<div class="y-page-header"><i class="y-logo"></i><?php echo smartyTranslate(array('s'=>'Create your Yotpo account','mod'=>'yotpo'),$_smarty_tpl);?>
</div>
			<fieldset id="y-fieldset">
				<div class="y-header"><?php echo smartyTranslate(array('s'=>'Generate more reviews, more engagement, and more sales.','mod'=>'yotpo'),$_smarty_tpl);?>
</div>
				<div class="y-label"><?php echo smartyTranslate(array('s'=>'Email address:','mod'=>'yotpo'),$_smarty_tpl);?>
</div>
				<div class="y-input"><input type="text" name="yotpo_user_email" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpo_email']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" /></div>
				<div class="y-label"><?php echo smartyTranslate(array('s'=>'Name','mod'=>'yotpo'),$_smarty_tpl);?>
</div>
				<div class="y-input"><input type="text" name="yotpo_user_name" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpo_userName']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" /></div>
				<div class="y-label"><?php echo smartyTranslate(array('s'=>'Password','mod'=>'yotpo'),$_smarty_tpl);?>
</div>
				<div class="y-input"><input type="password" name="yotpo_user_password" /></div>
				<div class="y-label"><?php echo smartyTranslate(array('s'=>'Confirm password','mod'=>'yotpo'),$_smarty_tpl);?>
</div>
				<div class="y-input"><input type="password" name="yotpo_user_confirm_password" /></div>
			</fieldset>
			<div class="y-footer"><input type="submit" name="yotpo_register" value="<?php echo smartyTranslate(array('s'=>'Register','mod'=>'yotpo'),$_smarty_tpl);?>
" class="y-submit-btn" /></div>
		</form>
		<form action="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['yotpo_action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post">
			<div class="y-footer"><?php echo smartyTranslate(array('s'=>'Already using Yotpo?','mod'=>'yotpo'),$_smarty_tpl);?>
 <input type="submit" name="log_in_button" value="click here" class="y-already-logged-in" /></div>
		</form>
	</div>
</div><?php }} ?>
