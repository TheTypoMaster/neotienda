<?php /* Smarty version Smarty-3.1.19, created on 2015-02-17 21:52:22
         compiled from "/home/neoliam/public_html/tienda/mails/es/order_conf_product_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129124860454e3f75e726d77-70684913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '495259cc2378780973afbf7c3d41dc1a4e58d9d3' => 
    array (
      0 => '/home/neoliam/public_html/tienda/mails/es/order_conf_product_list.tpl',
      1 => 1419915259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129124860454e3f75e726d77-70684913',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'product' => 0,
    'customization' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54e3f75e8567b7_00049778',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e3f75e8567b7_00049778')) {function content_54e3f75e8567b7_00049778($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
<tr>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="10">&nbsp;</td>
				<td>
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['reference'];?>

					</font>
				</td>
				<td width="10">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="10">&nbsp;</td>
				<td>
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<strong><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</strong>
					</font>
				</td>
				<td width="10">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="10">&nbsp;</td>
				<td align="right">
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['unit_price'];?>

					</font>
				</td>
				<td width="10">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="10">&nbsp;</td>
				<td align="right">
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity'];?>

					</font>
				</td>
				<td width="10">&nbsp;</td>
			</tr>
		</table>
	</td>
	<td style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="10">&nbsp;</td>
				<td align="right">
					<font size="2" face="Open-sans, sans-serif" color="#555454">
						<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>

					</font>
				</td>
				<td width="10">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>
	<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customization']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
		<tr>
		<td colspan="2" style="border:1px solid #D6D4D4;">
			<table class="table">
				<tr>
					<td width="10">&nbsp;</td>
					<td>
						<font size="2" face="Open-sans, sans-serif" color="#555454">
							<strong><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</strong><br>
							<?php echo $_smarty_tpl->tpl_vars['customization']->value['customization_text'];?>

						</font>
					</td>
					<td width="10">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td style="border:1px solid #D6D4D4;">
			<table class="table">
				<tr>
					<td width="10">&nbsp;</td>
					<td align="right">
						<font size="2" face="Open-sans, sans-serif" color="#555454">
							<?php echo $_smarty_tpl->tpl_vars['product']->value['unit_price'];?>

						</font>
					</td>
					<td width="10">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td style="border:1px solid #D6D4D4;">
			<table class="table">
				<tr>
					<td width="10">&nbsp;</td>
					<td align="right">
						<font size="2" face="Open-sans, sans-serif" color="#555454">
							<?php echo $_smarty_tpl->tpl_vars['customization']->value['customization_quantity'];?>

						</font>
					</td>
					<td width="10">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td style="border:1px solid #D6D4D4;">
			<table class="table">
				<tr>
					<td width="10">&nbsp;</td>
					<td align="right">
						<font size="2" face="Open-sans, sans-serif" color="#555454">
							<?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>

						</font>
					</td>
					<td width="10">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<?php } ?>
<?php } ?><?php }} ?>
