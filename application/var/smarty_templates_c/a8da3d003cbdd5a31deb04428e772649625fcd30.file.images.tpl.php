<?php /* Smarty version Smarty-3.1.6, created on 2012-10-22 17:05:54
         compiled from "application/views/images.tpl" */ ?>
<?php /*%%SmartyHeaderCode:540396121507e2f715596a2-47187042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8da3d003cbdd5a31deb04428e772649625fcd30' => 
    array (
      0 => 'application/views/images.tpl',
      1 => 1350896240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '540396121507e2f715596a2-47187042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_507e2f715cf11',
  'variables' => 
  array (
    'imagecity' => 0,
    'item' => 0,
    'city' => 0,
    'keywordlist' => 0,
    'keyword' => 0,
    'imagelist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507e2f715cf11')) {function content_507e2f715cf11($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>demo</title>
		<link href="/sta/style/common.css" type="text/css" rel="stylesheet">
		<link href="/sta/style/frame.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/sta/js/highslide-full.js"></script> <script type="text/javascript" src="/sta/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="/sta/style/highslide.css" type="text/css" 
</head>
<style>
.stile{
	width:1000px;
	position: relative;
	margin: auto;
}
#container{
	margin:auto;
	width:1000px;
}
#container .col{
	float:left;
	width:300px;
	background:#ececec;
	margin:5px;
	text-align:center;
}
.col a{
	left: 0;
    	width: 182px;
	display:block;
	cursor: pointer;
}
.chicun{
	background: none repeat scroll 0 0 #333333;
    	opacity: 0.8;
    	z-index: 0;	
	width:70px;
	right:0;
	position:absolute;
	padding: 5px;
	top:0;
}
.chicun span{
	color:#FFFFFF;
}
.choose{
	background: none repeat scroll 0 0 #333333;
    	opacity: 0.8;
    	z-index: 0;	
	left:0;
	position:absolute;
	padding: 2px;
	top:0;
	
}
</style>
<body>
<div class="stile">
<strong>城市</strong>:	
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['imagecity']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<a href="/show/images?city=<?php echo $_smarty_tpl->tpl_vars['item']->value['city'];?>
" <?php if ($_smarty_tpl->tpl_vars['city']->value==$_smarty_tpl->tpl_vars['item']->value['city']){?>style="color:red;font-weight:bold;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['city'];?>
</a>
<?php } ?>
</div>
	<br>
<div class="stile">
<strong>关键字</strong>:	
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['keywordlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<a href="/show/images?city=<?php echo $_smarty_tpl->tpl_vars['item']->value['city'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['item']->value['keyword'];?>
"<?php if ($_smarty_tpl->tpl_vars['keyword']->value==$_smarty_tpl->tpl_vars['item']->value['keyword']){?>style="color:red;font-weight:bold;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['keyword'];?>
</a>
<?php } ?>
(提示:点击对号或者错号图片 状态:错号为未选中 对号为选中)
</div>
<div id="container">
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['imagelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<div class="col">
		<a target="_blank" href="http://ybma.google.in1001.com/<?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['city'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['keyword'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['filename'];?>
"><img style="height:200px;"src="http://ybma.google.in1001.com/<?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['city'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['keyword'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['filename'];?>
" width="300">
		<div class="chicun"><span><?php echo $_smarty_tpl->tpl_vars['item']->value['width'];?>
x<?php echo $_smarty_tpl->tpl_vars['item']->value['height'];?>
</span></div>
		<a href=javascript:; onclick="choose('<?php echo $_smarty_tpl->tpl_vars['item']->value['choose'];?>
',<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" ><div class="choose" id="img<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img src="/sta/images/bg/<?php echo $_smarty_tpl->tpl_vars['item']->value['choose'];?>
.jpg" style="width:30px;"></div></a></a>
		<span><?php echo $_smarty_tpl->tpl_vars['item']->value['note'];?>
</span><br>
		<?php if ($_smarty_tpl->tpl_vars['item']->value['reimgurl']){?>图片地址:<?php echo $_smarty_tpl->tpl_vars['item']->value['reimgurl'];?>
<?php }?>
		手动介绍:<textarea id="rewrite<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onblur="rewrite(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" style="resize:none;width:200px;height:80px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['rewrite'];?>
</textarea>	
	</div>
	<?php } ?>	
</div>
<script type="text/javascript" src="http://sta.in1001.com/lib/jquery/jquery.masonry.js"></script>
<script type="text/javascript" src="http://sta.in1001.com/lib/jquery/jquery.infinitescroll.js"></script>
<script type="text/javascript">
$(function(){
  $('#container').masonry({
    itemSelector : '.col',
    columnWidth : 310 
  });
});
function choose(s,id){
	url = "http://travel.ymsun.in1001.com/show/setimages?id="+id+"&statue="+s;
	$.get(
		url,
		{},
		function(fuck){
			$("#img"+id).html(fuck);
			location.reload();
		}
	);
}
function rewrite(id){
	var s = $("#rewrite"+id).val();
	url = "http://travel.ymsun.in1001.com/show/setwrite?id="+id+"&content="+s;
	$.get(
		url,
		{},
		function(fuck){
			$("#rewrite"+id).html(fuck);
			location.reload();
		}
	);
}
</script>
</body>
</html>

<?php }} ?>