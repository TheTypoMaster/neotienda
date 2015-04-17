<?php /* Smarty version Smarty-3.1.19, created on 2015-02-18 23:11:53
         compiled from "/home/neoliam/public_html/tienda/themes/default-bootstrap/modules/loyalty/views/templates/front/loyalty.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160115460054e55b8165d6f3-88300838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efaa9af0b99d535bffa52226e122fefd9831dec0' => 
    array (
      0 => '/home/neoliam/public_html/tienda/themes/default-bootstrap/modules/loyalty/views/templates/front/loyalty.tpl',
      1 => 1406835656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160115460054e55b8165d6f3-88300838',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'orders' => 0,
    'totalPoints' => 0,
    'displayorders' => 0,
    'order' => 0,
    'nbpagination' => 0,
    'page' => 0,
    'p_previous' => 0,
    'max_page' => 0,
    'p_next' => 0,
    'pagination_link' => 0,
    'nArray' => 0,
    'nValue' => 0,
    'categories' => 0,
    'transformation_allowed' => 0,
    'voucher' => 0,
    'nbDiscounts' => 0,
    'discounts' => 0,
    'discount' => 0,
    'myorder' => 0,
    'minimalLoyalty' => 0,
    'base_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54e55b8204a8d4_92753629',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e55b8204a8d4_92753629')) {function content_54e55b8204a8d4_92753629($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Manage my account','mod'=>'loyalty'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My account','mod'=>'loyalty'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><span class="navigation_page"><?php echo smartyTranslate(array('s'=>'My loyalty points','mod'=>'loyalty'),$_smarty_tpl);?>
</span><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h1 class="page-heading"><?php echo smartyTranslate(array('s'=>'My loyalty points','mod'=>'loyalty'),$_smarty_tpl);?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>
<div class="block-center" id="block-history">
	<?php if ($_smarty_tpl->tpl_vars['orders']->value&&count($_smarty_tpl->tpl_vars['orders']->value)) {?>
	<table id="order-list" class="table table-bordered">
		<thead>
			<tr>
				<th class="first_item"><?php echo smartyTranslate(array('s'=>'Order','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Date','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Points','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="last_item"><?php echo smartyTranslate(array('s'=>'Points Status','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
			</tr>
		</thead>
		<tfoot>
			<tr class="alternate_item">
				<td colspan="2" class="history_method bold" style="text-align:center;"><?php echo smartyTranslate(array('s'=>'Total points available:','mod'=>'loyalty'),$_smarty_tpl);?>
</td>
				<td class="history_method" style="text-align:left;"><?php echo intval($_smarty_tpl->tpl_vars['totalPoints']->value);?>
</td>
				<td class="history_method">&nbsp;</td>
			</tr>
		</tfoot>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['displayorders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
			<tr class="alternate_item">
				<td class="history_link bold"><?php echo smartyTranslate(array('s'=>'#','mod'=>'loyalty'),$_smarty_tpl);?>
<?php echo sprintf("%06d",$_smarty_tpl->tpl_vars['order']->value['id']);?>
</td>
				<td class="history_date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value['date'],'full'=>1),$_smarty_tpl);?>
</td>
				<td class="history_method"><?php echo intval($_smarty_tpl->tpl_vars['order']->value['points']);?>
</td>
				<td class="history_method"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['state'], ENT_QUOTES, 'UTF-8', true);?>
</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<div id="block-order-detail" class="unvisible">&nbsp;</div>
	<?php } else { ?>
		<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'You have not placed any orders.','mod'=>'loyalty'),$_smarty_tpl);?>
</p>
	<?php }?>
</div>
<div id="pagination" class="pagination">
	<?php if ($_smarty_tpl->tpl_vars['nbpagination']->value<count($_smarty_tpl->tpl_vars['orders']->value)) {?>
		<ul class="pagination">
		<?php if ($_smarty_tpl->tpl_vars['page']->value!=1) {?>
			<?php $_smarty_tpl->tpl_vars['p_previous'] = new Smarty_variable($_smarty_tpl->tpl_vars['page']->value-1, null, 0);?>
			<li id="pagination_previous">
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['summarypaginationlink'][0][0]->getSummaryPaginationLink(array('p'=>$_smarty_tpl->tpl_vars['p_previous']->value,'n'=>$_smarty_tpl->tpl_vars['nbpagination']->value),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Previous','mod'=>'loyalty'),$_smarty_tpl);?>
" rel="nofollow">&laquo;&nbsp;<?php echo smartyTranslate(array('s'=>'Previous','mod'=>'loyalty'),$_smarty_tpl);?>
</a>
			</li>
		<?php } else { ?>
			<li id="pagination_previous" class="disabled"><span>&laquo;&nbsp;<?php echo smartyTranslate(array('s'=>'Previous','mod'=>'loyalty'),$_smarty_tpl);?>
</span></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['page']->value>2) {?>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['summarypaginationlink'][0][0]->getSummaryPaginationLink(array('p'=>'1','n'=>$_smarty_tpl->tpl_vars['nbpagination']->value),$_smarty_tpl);?>
" rel="nofollow">1</a></li>
			<?php if ($_smarty_tpl->tpl_vars['page']->value>3) {?>
				<li class="truncate">...</li>
			<?php }?>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['name'] = 'pagination';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = (int) $_smarty_tpl->tpl_vars['page']->value-1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value+2) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total']);
?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value==$_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index']) {?>
				<li class="current"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></li>
			<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index']>0&&count($_smarty_tpl->tpl_vars['orders']->value)+$_smarty_tpl->tpl_vars['nbpagination']->value>($_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index'])*($_smarty_tpl->tpl_vars['nbpagination']->value)) {?>
				<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['summarypaginationlink'][0][0]->getSummaryPaginationLink(array('p'=>$_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index'],'n'=>$_smarty_tpl->tpl_vars['nbpagination']->value),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
			<?php }?>
		<?php endfor; endif; ?>
		<?php if ($_smarty_tpl->tpl_vars['max_page']->value-$_smarty_tpl->tpl_vars['page']->value>1) {?>
			<?php if ($_smarty_tpl->tpl_vars['max_page']->value-$_smarty_tpl->tpl_vars['page']->value>2) {?>
				<li class="truncate">...</li>
			<?php }?>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['summarypaginationlink'][0][0]->getSummaryPaginationLink(array('p'=>$_smarty_tpl->tpl_vars['max_page']->value,'n'=>$_smarty_tpl->tpl_vars['nbpagination']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['max_page']->value;?>
</a></li>
		<?php }?>
		<?php if (count($_smarty_tpl->tpl_vars['orders']->value)>$_smarty_tpl->tpl_vars['page']->value*$_smarty_tpl->tpl_vars['nbpagination']->value) {?>
			<?php $_smarty_tpl->tpl_vars['p_next'] = new Smarty_variable($_smarty_tpl->tpl_vars['page']->value+1, null, 0);?>
			<li id="pagination_next"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['summarypaginationlink'][0][0]->getSummaryPaginationLink(array('p'=>$_smarty_tpl->tpl_vars['p_next']->value,'n'=>$_smarty_tpl->tpl_vars['nbpagination']->value),$_smarty_tpl);?>
" title="Next" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Next','mod'=>'loyalty'),$_smarty_tpl);?>
&nbsp;&raquo;</a></li>
		<?php } else { ?>
			<li id="pagination_next" class="disabled"><span><?php echo smartyTranslate(array('s'=>'Next','mod'=>'loyalty'),$_smarty_tpl);?>
&nbsp;&raquo;</span></li>
		<?php }?>
		</ul>
	<?php }?>
	<?php if (count($_smarty_tpl->tpl_vars['orders']->value)>10) {?>
		<form action="<?php echo $_smarty_tpl->tpl_vars['pagination_link']->value;?>
" method="get" class="pagination">
			<p>
				<input type="submit" class="button_mini" value="<?php echo smartyTranslate(array('s'=>'OK','mod'=>'loyalty'),$_smarty_tpl);?>
" />
				<label for="nb_item"><?php echo smartyTranslate(array('s'=>'items:','mod'=>'loyalty'),$_smarty_tpl);?>
</label>
				<select name="n" id="nb_item">
				<?php  $_smarty_tpl->tpl_vars['nValue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nValue']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nValue']->key => $_smarty_tpl->tpl_vars['nValue']->value) {
$_smarty_tpl->tpl_vars['nValue']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['nValue']->value<=count($_smarty_tpl->tpl_vars['orders']->value)) {?>
						<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nValue']->value, ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['nbpagination']->value==$_smarty_tpl->tpl_vars['nValue']->value) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nValue']->value, ENT_QUOTES, 'UTF-8', true);?>
</option>
					<?php }?>
				<?php } ?>
				</select>
				<input type="hidden" name="p" value="1" />
			</p>
		</form>
	<?php }?>
	</div>

<p><?php echo smartyTranslate(array('s'=>'Vouchers generated here are usable in the following categories : ','mod'=>'loyalty'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?><?php echo $_smarty_tpl->tpl_vars['categories']->value;?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'All','mod'=>'loyalty'),$_smarty_tpl);?>
<?php }?></p>

<?php if ($_smarty_tpl->tpl_vars['transformation_allowed']->value) {?>
<p class="text-center">
	<a class="btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('loyalty','default',array('process'=>'transformpoints'),true), ENT_QUOTES, 'UTF-8', true);?>
" onclick="return confirm('<?php echo smartyTranslate(array('s'=>'Are you sure you want to transform your points into vouchers?','mod'=>'loyalty','js'=>1),$_smarty_tpl);?>
');"><?php echo smartyTranslate(array('s'=>'Transform my points into a voucher of','mod'=>'loyalty'),$_smarty_tpl);?>
 <span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['voucher']->value),$_smarty_tpl);?>
</span>.</a>
</p>
<?php }?>

<h1 class="page-heading"><?php echo smartyTranslate(array('s'=>'My vouchers from loyalty points','mod'=>'loyalty'),$_smarty_tpl);?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['nbDiscounts']->value) {?>
<div class="block-center" id="block-history">
	<table id="order-list" class="table table-bordered">
		<thead>
			<tr>
				<th class="first_item"><?php echo smartyTranslate(array('s'=>'Created','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Value','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Code','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Valid from','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Valid until','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Status','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
				<th class="last_item"><?php echo smartyTranslate(array('s'=>'Details','mod'=>'loyalty'),$_smarty_tpl);?>
</th>
			</tr>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
			<tr class="alternate_item">
				<td class="history_date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['discount']->value->date_add),$_smarty_tpl);?>
</td>
				<td class="history_price"><span class="price"><?php if ($_smarty_tpl->tpl_vars['discount']->value->reduction_percent>0) {?>
						<?php echo $_smarty_tpl->tpl_vars['discount']->value->reduction_percent;?>
%
					<?php } elseif ($_smarty_tpl->tpl_vars['discount']->value->reduction_amount) {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value->reduction_amount,'currency'=>$_smarty_tpl->tpl_vars['discount']->value->reduction_currency),$_smarty_tpl);?>

					<?php } else { ?>
						<?php echo smartyTranslate(array('s'=>'Free shipping','mod'=>'loyalty'),$_smarty_tpl);?>

					<?php }?></span></td>
				<td class="history_method bold"><?php echo $_smarty_tpl->tpl_vars['discount']->value->code;?>
</td>
				<td class="history_date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['discount']->value->date_from),$_smarty_tpl);?>
</td>
				<td class="history_date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['discount']->value->date_to),$_smarty_tpl);?>
</td>
				<td class="history_method bold"><?php if ($_smarty_tpl->tpl_vars['discount']->value->quantity>0) {?><?php echo smartyTranslate(array('s'=>'To use','mod'=>'loyalty'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Used','mod'=>'loyalty'),$_smarty_tpl);?>
<?php }?></td>
				<td class="history_method">
                    <a rel="#order_tip_<?php echo intval($_smarty_tpl->tpl_vars['discount']->value->id);?>
" class="cluetip" title="<?php echo smartyTranslate(array('s'=>'Generated by these following orders','mod'=>'loyalty'),$_smarty_tpl);?>
" href="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smartyTranslate(array('s'=>'more...','mod'=>'loyalty'),$_smarty_tpl);?>
</a>
                    <div class="hidden" id="order_tip_<?php echo intval($_smarty_tpl->tpl_vars['discount']->value->id);?>
">
						<ul>
						<?php  $_smarty_tpl->tpl_vars['myorder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['myorder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discount']->value->orders; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['myorder']->key => $_smarty_tpl->tpl_vars['myorder']->value) {
$_smarty_tpl->tpl_vars['myorder']->_loop = true;
?>
							<li>
								<?php ob_start();?><?php echo smartyTranslate(array('s'=>'Order #%d','mod'=>'loyalty'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo sprintf($_tmp1,$_smarty_tpl->tpl_vars['myorder']->value['id_order']);?>

								(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['myorder']->value['total_paid'],'currency'=>$_smarty_tpl->tpl_vars['myorder']->value['id_currency']),$_smarty_tpl);?>
) :
								<?php if ($_smarty_tpl->tpl_vars['myorder']->value['points']>0) {?><?php ob_start();?><?php echo smartyTranslate(array('s'=>'%d points.','mod'=>'loyalty'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo sprintf($_tmp2,$_smarty_tpl->tpl_vars['myorder']->value['points']);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Cancelled','mod'=>'loyalty'),$_smarty_tpl);?>
<?php }?>
							</li>
						<?php } ?>
                   		</ul>
					</div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<div id="block-order-detail" class="unvisible">&nbsp;</div>
</div>
	
<?php if ($_smarty_tpl->tpl_vars['minimalLoyalty']->value>0) {?><p><?php echo smartyTranslate(array('s'=>'The minimum order amount in order to use these vouchers is:','mod'=>'loyalty'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['minimalLoyalty']->value),$_smarty_tpl);?>
</p><?php }?>

<?php } else { ?>
<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'No vouchers yet.','mod'=>'loyalty'),$_smarty_tpl);?>
</p>
<?php }?>
<?php } else { ?>
<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'No reward points yet.','mod'=>'loyalty'),$_smarty_tpl);?>
</p>
<?php }?>

<ul class="footer_links clearfix">
	<li>
		<a class="btn btn-default button button-small" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Back to Your Account','mod'=>'loyalty'),$_smarty_tpl);?>
" rel="nofollow"><span><i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Back to Your Account','mod'=>'loyalty'),$_smarty_tpl);?>
</span></a>
	</li>
	<li>
		<a class="btn btn-default button button-small" href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Home','mod'=>'loyalty'),$_smarty_tpl);?>
"><span><i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Home','mod'=>'loyalty'),$_smarty_tpl);?>
</span></a>
	</li>
</ul>
<?php }} ?>
