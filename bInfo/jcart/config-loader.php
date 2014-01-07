<?php
// By default, this file returns the $config array for use with PHP scripts
// If requested via Ajax, the array is encoded as JSON and echoed out to the browser

// Don't edit here, edit config.php
include_once('config.php');

// Use default values for any settings that have been left empty
if (!$config['currencyCode']) $config['currencyCode']                     = 'RMB';
if (!$config['text']['cartTitle']) $config['text']['cartTitle']           = '购物车';
if (!$config['text']['singleItem']) $config['text']['singleItem']         = '件';
if (!$config['text']['multipleItems']) $config['text']['multipleItems']   = '件';
if (!$config['text']['subtotal']) $config['text']['subtotal']             = '总共';
if (!$config['text']['update']) $config['text']['update']                 = 'update';
if (!$config['text']['checkout']) $config['text']['checkout']             = '前往结账';
if (!$config['text']['checkoutPaypal']) $config['text']['checkoutPaypal'] = '前往付款';
if (!$config['text']['removeLink']) $config['text']['removeLink']         = '删除';
if (!$config['text']['emptyButton']) $config['text']['emptyButton']       = 'empty';
if (!$config['text']['emptyMessage']) $config['text']['emptyMessage']     = '您还没添加';
if (!$config['text']['itemAdded']) $config['text']['itemAdded']           = '<div id="jcarttoolclose"><a id="jcartttipclose">关闭</a></div><div class="clear"></div>
<div class="jcarttooldiv" style="padding-top:5px; font-size:15px; font-weight:bold;"><img src="../bInfo/jcart/images/checkmark.png" />本书已成功添加到购物车！</div>
<div class="jcarttooldiv" style="padding-top:20px;"><a href="checkout.php" class="button small orange">去购物车结算</a></div>';
if (!$config['text']['priceError']) $config['text']['priceError']         = '您输入的价格有误';
if (!$config['text']['quantityError']) $config['text']['quantityError']   = '请输入整数';
if (!$config['text']['checkoutError']) $config['text']['checkoutError']   = '您的订单处理失败';

if ($_GET['ajax'] == 'true') {
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($config);
}
?>

