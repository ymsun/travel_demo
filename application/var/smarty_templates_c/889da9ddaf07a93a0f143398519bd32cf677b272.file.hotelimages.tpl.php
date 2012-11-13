<?php /* Smarty version Smarty-3.1.6, created on 2012-10-23 12:03:03
         compiled from "application/views/hotelimages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1620814617508616f7ce0c55-86118906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '889da9ddaf07a93a0f143398519bd32cf677b272' => 
    array (
      0 => 'application/views/hotelimages.tpl',
      1 => 1350962955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1620814617508616f7ce0c55-86118906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hotelimage' => 0,
    'item' => 0,
    'photos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_508616f7ec018',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508616f7ec018')) {function content_508616f7ec018($_smarty_tpl) {?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>demo</title>
<link href="/sta/style/common.css" type="text/css" rel="stylesheet">
<link href="/sta/style/frame.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/sta/js/highslide-full.js"></script>
<link rel="stylesheet" href="/sta/style/highslide.css" type="text/css" />
 <script type="text/javascript" src="/sta/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="http://sta.in1001.com/lib/jquery/jquery.masonry.js"></script>
<script type="text/javascript" src="http://sta.in1001.com/lib/jquery/jquery.infinitescroll.js"></script>
</head>
<script type="text/javascript">
hs.graphicsDir = '/sta/images/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.fadeInOut = true;
hs.dimmingOpacity = 0.8;
hs.outlineType = 'rounded-white';
hs.captionEval = 'this.thumb.alt';
hs.marginBottom = 105; // make room for the thumbstrip and the controls
hs.numberPosition = 'caption';

// Add the slideshow providing the controlbar and the thumbstrip
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	overlayOptions: {
		className: 'text-controls',
		position: 'bottom center',
		relativeTo: 'viewport',
		offsetY: -60
	},
	thumbstrip: {
		position: 'bottom center',
		mode: 'horizontal',
		relativeTo: 'viewport'
	}
});
</script>
<style>
.content{
	margin:auto;
	width:1000px;
}
#container{
	margin:auto;
	width:1000px;
}
#container .col{
	float:left;
	width:120px;;
	background:#ececec;
	margin:5px;
	text-align:center;
}
</style>
<body>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['hotelimage']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<div class="content">
<strong>饭店</strong>:<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<br>
</div>
<div id="container" class="highslide-gallery" >
	<?php  $_smarty_tpl->tpl_vars['photos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photos']->key => $_smarty_tpl->tpl_vars['photos']->value){
$_smarty_tpl->tpl_vars['photos']->_loop = true;
?>
		<div class="col">
			<a class='highslide' href='<?php echo $_smarty_tpl->tpl_vars['photos']->value;?>
' onclick="return hs.expand(this)">
<img src='<?php echo $_smarty_tpl->tpl_vars['photos']->value;?>
' style="width:100px;"/></a>	
		</div>
	<?php } ?>
</div>
<?php } ?>
<script type="text/javascript">
$(function(){
  $('#container').masonry({
    itemSelector : '.col',
    columnWidth : 130 
  });
});
</script>
</body>
</html>

<?php }} ?>