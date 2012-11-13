<?php /* Smarty version Smarty-3.1.6, created on 2012-11-12 17:25:35
         compiled from "application/views/restaurants.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1293934015508284699dafb3-18875411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f24a1c52f4eae1f0a944f55fdd5a4b0e7afe0d4' => 
    array (
      0 => 'application/views/restaurants.tpl',
      1 => 1352712332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1293934015508284699dafb3-18875411',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_50828469aee60',
  'variables' => 
  array (
    'prolist' => 0,
    'item' => 0,
    'pid' => 0,
    'citylist' => 0,
    'cid' => 0,
    'cityerlist' => 0,
    'handle' => 0,
    'key' => 0,
    'cityname' => 0,
    'type' => 0,
    'foodword' => 0,
    'keyword' => 0,
    'value' => 0,
    'rest' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50828469aee60')) {function content_50828469aee60($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>demo</title>
<link href="/sta/style/common.css" type="text/css" rel="stylesheet">
<link href="/sta/style/frame.css" type="text/css" rel="stylesheet">
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
	<span  style="width: 50px;"> <a href="/show/restaurants?pid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
	<span  style="width: 50px;"> <a href="/show/restaurants?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
	<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['cid']->value){?>
	<font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</font>
	<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

	<?php }?>
	</a></span>
<?php } ?>
	<br>
	<br>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cityerlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<span  style="width: 50px;"> <a href="/show/restaurants?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
	<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['cid']->value){?>
	<font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</font>
	<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

	<?php }?>
	</a></span>
<?php } ?>
	<br>
	<br>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['handle']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<span  style="width: 50px;"> 	<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['cityname']->value){?>
	<?php  $_smarty_tpl->tpl_vars['foodword'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foodword']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foodword']->key => $_smarty_tpl->tpl_vars['foodword']->value){
$_smarty_tpl->tpl_vars['foodword']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['foodword']->key;
?>
	<font><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
:</font>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['foodword']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
		<font><a <?php if ($_smarty_tpl->tpl_vars['keyword']->value==$_smarty_tpl->tpl_vars['value']->value){?>style="color:red;" <?php }?>href="/show/restaurants?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&foodtype=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</a></font>
		<?php } ?>
	<br>
	<?php } ?>
	<?php }?>
	</span>
<?php } ?>
</div>
<style>
.choose{
	position:absolute;
	top:0;
	opacity:0.8;
	left:0;
	background:none repeat scroll 0 0 #333;
}
</style>
<div class="content">
	<ul>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rest']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<li style="float:left;width:300px;height:600px;margin:5px;position:relative;">
			<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['cover'];?>
"><br>
			<a href=javascript:; onclick="choose('<?php echo $_smarty_tpl->tpl_vars['item']->value['choose'];?>
',<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" ><div class="choose" id="img<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img src="/sta/images/bg/<?php echo $_smarty_tpl->tpl_vars['item']->value['choose'];?>
.jpg" style="width:30px;"></div></a></a>
			<strong>饭店</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<br>
			<strong>店面</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['subname'];?>
<br>
			<strong>等级</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['grade'];?>
<br>
			<strong>电话</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
<br>
			<strong>price</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
<br>
			<strong>口味</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['t_score'];?>
<br>
			<strong>环境</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['e_score'];?>
<br>
			<strong>服务</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['s_score'];?>
<br>
			<strong>价格</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
<br>
			<strong>地址</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['address'];?>
<br>
			<strong>公交</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['bus'];?>
<br>
			<strong>自行</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['subway'];?>
<br>
			<strong>时间</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['opentime'];?>
<br>
			<strong>停车</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['park'];?>
<br>
			<strong>菜系</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['cuisines'];?>
<br>
			<strong>特色</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['feature'];?>
<br>
			<strong>网友推荐菜</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['recommend_foods'];?>
<br>
			<strong>类型</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['atmosphere'];?>
<br>
			<strong>图片</strong>:<a target="_blank" href="/show/restimages?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">查看</a><br>
		<?php } ?>
	</ul>		
</div>
<div><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
<script type="text/javascript">
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
</script>
</body>
</html>

<?php }} ?>