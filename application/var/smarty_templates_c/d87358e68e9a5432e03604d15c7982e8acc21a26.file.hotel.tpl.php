<?php /* Smarty version Smarty-3.1.6, created on 2012-10-23 11:41:31
         compiled from "application/views/hotel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201457801350810ad25df2c6-50523562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd87358e68e9a5432e03604d15c7982e8acc21a26' => 
    array (
      0 => 'application/views/hotel.tpl',
      1 => 1350963685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201457801350810ad25df2c6-50523562',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_50810ad26a842',
  'variables' => 
  array (
    'prolist' => 0,
    'item' => 0,
    'pid' => 0,
    'citylist' => 0,
    'cid' => 0,
    'hotel' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50810ad26a842')) {function content_50810ad26a842($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>demo</title>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
<link href="/sta/style/common.css" type="text/css" rel="stylesheet">
<link href="/sta/style/frame.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/sta/js/highslide-full.js"></script>
<script type="text/javascript" src="/sta/js/jquery-1.8.0.min.js"></script>
</head>
<style>
.content{
	margin:auto;
	width:1000px;
}
</style>
<body>
<div class="main-con" style="width: 900px; margin: auto;"> 
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['prolist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<span  style="width: 50px;"> <a href="/show/hotel?pid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> 
	<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['pid']->value){?>
	<font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</font>
	<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

	<?php }?></a></span>
<?php } ?>
	<Br>
	<br>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['citylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<span  style="width: 50px;"> <a href="/show/hotel?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
	<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['cid']->value){?>
	<font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</font>
	<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

	<?php }?>
	</a></span>
<?php } ?>
</div>
<div class="content">
	<ul>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['hotel']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<li style="float:left;width:300px;height:400px;margin:5px;">
			<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['cover'];?>
"><br>
			<strong>酒店</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<br>
			<strong>类型</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['cate'];?>
<br>
			<strong>满意度</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['manyidu'];?>
<br>
			<strong>价格</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
<br>
			<strong>地址</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['sectionName'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['address'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['street_address'];?>
<br>
			<strong>介绍</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['intro'];?>
<br>
			<strong>图片</strong>:<a target="_blank" href="/show/hotelimages?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">查看</a><br>
		</li>
		<?php } ?>
	</ul>		
</div>
<div><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
</body>
</html>

<?php }} ?>