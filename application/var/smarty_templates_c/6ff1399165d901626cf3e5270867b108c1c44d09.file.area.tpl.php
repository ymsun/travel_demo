<?php /* Smarty version Smarty-3.1.6, created on 2012-10-20 16:35:33
         compiled from "application/views/area.tpl" */ ?>
<?php /*%%SmartyHeaderCode:764935615039e747c49b29-15323874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ff1399165d901626cf3e5270867b108c1c44d09' => 
    array (
      0 => 'application/views/area.tpl',
      1 => 1350721871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '764935615039e747c49b29-15323874',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5039e747e820d',
  'variables' => 
  array (
    'ainfo' => 0,
    'scene_traffic' => 0,
    'scene_dining' => 0,
    'scene_line' => 0,
    'item' => 0,
    'scene_geo_his' => 0,
    'scene_around_scene' => 0,
    'scene_attention' => 0,
    'scene_useful' => 0,
    'scene_goods' => 0,
    'scene_business' => 0,
    'scene_shopping_desc' => 0,
    'scene_pic' => 0,
    'sinfo' => 0,
    'jsonmap' => 0,
    'cent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5039e747e820d')) {function content_5039e747e820d($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>demo</title>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
		<link href="/sta/style/common.css" type="text/css" rel="stylesheet">
		<link href="/sta/style/frame.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/sta/js/highslide-full.js"></script>
<script type="text/javascript" src="/sta/js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="/sta/style/highslide.css" type="text/css" />
<style type="text/css">
			#guding{ height:auto; width:auto; position: fixed; top:0; right:0; z-index:999}
			.f{ color:#FFFFFF; line-height:30px; text-align:center}
#conte{
	margin:auto;
	width:650px;
}
#conte .col{
	float:left;
	width:200px;
	background:#ececec;
	margin:5px;
	text-align:center;
}
.col img{
	left: 0;
    	width: 200px;
	display:block;
	cursor: pointer;
}
</style>
</head>
	<body>
		<div id="blue" style="height: 756px;">
		<div class="main-con" style="width: 1041px; margin: auto;"> 
			<div id="table_height" class="box-left">
			<img src="<?php echo $_smarty_tpl->tpl_vars['ainfo']->value['cover'];?>
"> <br><br>
			<b>当前景区</b>：<?php echo $_smarty_tpl->tpl_vars['ainfo']->value['name'];?>
 评价:<b style="color:red;"><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['level'];?>
</b><br><br>
			<?php if ($_smarty_tpl->tpl_vars['ainfo']->value['feature']){?><strong>特色</strong>:<?php echo $_smarty_tpl->tpl_vars['ainfo']->value['feature'];?>
<br><?php }?>
			<strong>标签</strong>: <?php echo $_smarty_tpl->tpl_vars['ainfo']->value['tag'];?>
</b><br>
			<strong>景区类型</strong>: <?php echo $_smarty_tpl->tpl_vars['ainfo']->value['type'];?>
</b><br>
			<strong>地址</strong>: <?php echo $_smarty_tpl->tpl_vars['ainfo']->value['address'];?>
<br>
			<strong>最佳玩游时间</strong>:<?php echo $_smarty_tpl->tpl_vars['ainfo']->value['be_visit_time'];?>
<br>
			<strong>开放时间</strong>: <?php if ($_smarty_tpl->tpl_vars['ainfo']->value['opentime']=='-'){?> 暂无数据 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['ainfo']->value['opentime'];?>
 <?php }?><br>
			<strong>门票</strong>: <?php echo $_smarty_tpl->tpl_vars['ainfo']->value['price'];?>
<br>
			<?php if ($_smarty_tpl->tpl_vars['ainfo']->value['price_disc']){?><strong>门票描述</strong>: <?php echo $_smarty_tpl->tpl_vars['ainfo']->value['price_disc'];?>
<br><?php }?>
			<strong>建议玩游时间</strong>:<?php if ($_smarty_tpl->tpl_vars['ainfo']->value['time']){?><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['time'];?>
小时<?php }else{ ?>暂无数据<?php }?><br>
			<strong>简介</strong>:<pre style=" white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['ainfo']->value['intro'];?>
</pre>
			<strong>交通</strong>:<br>	
				<?php if ($_smarty_tpl->tpl_vars['scene_traffic']->value){?>
				<?php echo $_smarty_tpl->tpl_vars['scene_traffic']->value;?>

				<?php }else{ ?>
				暂无数据 <br>
				<?php }?>
			<strong>饮食</strong>：<?php if ($_smarty_tpl->tpl_vars['scene_dining']->value){?> <?php echo $_smarty_tpl->tpl_vars['scene_dining']->value['desc'];?>
 <?php }else{ ?>暂无数据<?php }?> <br>
			<strong>电话</strong>：<?php echo $_smarty_tpl->tpl_vars['ainfo']->value['phone'];?>
<br>
		<?php if ($_smarty_tpl->tpl_vars['scene_line']->value){?>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['scene_line']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<strong><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</strong>：	<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
 <br>
		<?php } ?>
		<?php }?>
			<strong>文化历史</strong>:
		<?php if ($_smarty_tpl->tpl_vars['scene_geo_his']->value){?>
			<br>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['scene_geo_his']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
--<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
 <br>
		<?php } ?>
		<?php }else{ ?>
			暂无数据<br>
		<?php }?>
			<!--<strong>周边</strong>:
		<?php if ($_smarty_tpl->tpl_vars['scene_around_scene']->value){?>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['scene_around_scene']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<?php echo $_smarty_tpl->tpl_vars['item']->value['sname'];?>
&nbsp; &nbsp;&nbsp;
		<?php } ?>
		<br>
		<?php }else{ ?>
			暂无数据<br>
		<?php }?>-->
			<strong>小贴士</strong>:<br>
		<?php if ($_smarty_tpl->tpl_vars['scene_attention']->value){?>
		<?php echo $_smarty_tpl->tpl_vars['scene_attention']->value['desc'];?>
<br> 
		<?php }else{ ?>
			暂无数据<br>
		<?php }?>
			<strong>实用信息</strong>:<br>
		<?php if ($_smarty_tpl->tpl_vars['scene_useful']->value){?>
			<?php echo $_smarty_tpl->tpl_vars['scene_useful']->value;?>
	
		<?php }else{ ?>
			暂无数据<br>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['scene_goods']->value){?>
		<strong>购物关于美食</strong>:
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['scene_goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
：
		<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
<br> 
		<?php } ?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['scene_business']->value){?>
		<br>
		<strong>购物关于商业</strong>:
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['scene_business']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
：
		<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
<br> 
		<?php } ?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['scene_shopping_desc']->value){?>
		<strong>购物简介</strong>:
		<?php echo $_smarty_tpl->tpl_vars['scene_shopping_desc']->value;?>
<br> 
		<?php }?>
		<Br> <Br> <Br>
		<div id="conte">
			<ul>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'-'key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['scene_pic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key'-'key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<li class="col"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"style="height:200px;" ></a></li>

			<?php } ?>
			</ul>
		</div>
<?php if (count($_smarty_tpl->tpl_vars['sinfo']->value)==0){?> 
<br> <br> <br> <br> <br> <br>
暂无景点数据 ！

<?php }else{ ?>
<div style="clear:both;"></div>
景点列表 ：
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sinfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>

				<div class="clearfix" spot="" tid="<?php echo $_smarty_tpl->tpl_vars['item']->value['hid'];?>
" lant="<?php echo $_smarty_tpl->tpl_vars['item']->value['lat'];?>
" long="<?php echo $_smarty_tpl->tpl_vars['item']->value['lgt'];?>
">
					<dl class="area-list mt30">
						<dt><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
"  class="highslide" onclick="return hs.expand(this)"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" height="99px" width="99px"></a></dt>
						<dd class="f14 mbm5"><b class="ico-map col-white fontw pr5 fal"><?php echo $_smarty_tpl->tpl_vars['item']->value['hid'];?>
</b>
<!--// <a href="/show/showpoints?sid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" target="_blank">
<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

</a>--><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

							<b class="start4-5"></b>
						</h3>
						</dd>
						票价: <?php if ($_smarty_tpl->tpl_vars['item']->value['price']=='0'){?> 暂无数据 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 <?php }?> <br>
						开放时间: <?php if ($_smarty_tpl->tpl_vars['item']->value['opentime']=='-'){?> 暂无数据 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['item']->value['opentime'];?>
 <?php }?> <br>
						<dd><?php echo $_smarty_tpl->tpl_vars['item']->value['abstract'];?>
<!--<a href="/show/showpoints?sid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" target="_blank">更多</a>--></dd>
						
					</dl>
				</div>

		<?php } ?>
<?php }?>


			
		</div>
		</div>
<div id ="guding">
<div class = "f">
			<div style="float:right;width:420px;height:640px;border:1px solid gray;margin-top: 33px;" id="container"></div>
</div>
</div>
</body>
	
	<script type="text/javascript">
	//  标注点数组
	
var BASEDATA = <?php echo $_smarty_tpl->tpl_vars['jsonmap']->value;?>

	
	//创建和初始化地图函数：
	function initMap(){
		window.map = new BMap.Map("container");
	
		map.centerAndZoom(new BMap.Point(<?php echo $_smarty_tpl->tpl_vars['cent']->value['long'];?>
,<?php echo $_smarty_tpl->tpl_vars['cent']->value['lati'];?>
),15); //景区中心经纬度
	
		map.enableScrollWheelZoom();//鼠标滑轮放大缩小
		map.addControl(new BMap.NavigationControl()); //增加控件 左侧
		addMarker(BASEDATA);//向地图中添加marker
	}

//创建marker
window.addMarker = function (data){
	map.clearOverlays();//清除地图上所有覆盖物。
	for(var i=0;i<data.length;i++){
		var json = data[i];
		var p0 = json.point.split("|")[0];//纬度
		var p1 = json.point.split("|")[1];//精度
		var point = new BMap.Point(p0,p1);
		var iconImg = createIcon(i);
		var marker = new BMap.Marker(point,{icon:iconImg});
		var iw = createInfoWindow(i);//i 地图数字标识
		//{title:"西城区图书馆",content:"北京市西城区后广平胡同26号",point:"116.368099|39.942332",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
		var label = new BMap.Label(json.title,{"offset":new BMap.Size(1,-1)});
		marker.setLabel(label);//为标注添加文本标注。
		map.addOverlay(marker);//将覆盖物添加到地图中，一个覆盖物实例只能向地图中添加一次。 
		label.setStyle({//设置文本标注样式
		borderColor:"#ff0000",
		color:"#ff0000",
		cursor:"pointer"
		});
		(function(){
			 var _json = json;
			 var _iw = createInfoWindow(_json);
			 var _marker = marker;
			 _marker.addEventListener("click",function(){ //marker获取content
				 this.openInfoWindow(_iw);
				 this.setAnimation(BMAP_ANIMATION_DROP);	 
				 });
			 _iw.addEventListener("open",function(){
				 _marker.getLabel().hide();//返回标注的文本标注。 隐藏
				 })
			 _iw.addEventListener("close",function(){
				 _marker.getLabel().show();//返回标注的文本标注。 显示
				 })
			 label.addEventListener("click",function(){//点击标签获取content
				 _marker.openInfoWindow(_iw);
				 })
				 /*信息框content 默认
			 if(!!json.isOpen){
			 label.hide();
			 _marker.openInfoWindow(_iw);
			 }*/
		 })()
	}
}
//创建InfoWindow
function createInfoWindow(json){ //创建信息框content
	var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div style='float:right;margin: 6px;'><img width='100' height='100' src='" + json.image + "'></div><div class='iw_poi_content'></div>");
	return iw;
}
//创建一个Icon
function createIcon(i){//创建标签信息
	var icon = new BMap.Icon("http://dev.baidu.com/wiki/static/map/API/examples/images/ico-1-9.png", new BMap.Size(28,37),{imageOffset: new BMap.Size(0 - i * 28, 0),infoWindowAnchor:new BMap.Size(15,0),anchor:new BMap.Size(3,0)})
		return icon;
}

function resultRoute(){
	var start = $("#start").val();
	var end = $("#end").val();
	var s0 = start.split("|")[0];//纬度
	var s1 = start.split("|")[1];//精度
	var e0 = end.split("|")[0];//纬度
	var e1 = end.split("|")[1];//精度
	var point1 = new BMap.Point(s0,s1);
	var point2 = new BMap.Point(e0,e1);
	var transit = new BMap.TransitRoute(map, {
			renderOptions: {map: map, panel: "results"}
	});
	transit.search(point1, point2);
	//initMap();
}
initMap();//创建和初始化地图
//触发地图
$("div .clearfix").mouseenter(function(){
	var i = $(this).attr("tid");
	var lon = $(this).attr("long");
	var lant = $(this).attr("lant");
	var point = new BMap.Point(lon,lant);
	var iconImg = createIcon(i-1);
	var iw = createInfoWindow(BASEDATA[i-1]);//i 地图数字标识
	var marker = new BMap.Marker(point,{icon:iconImg});
	map.addOverlay(marker);//将覆盖物添加到地图中，一个覆盖物实例只能向地图中添加一次。 
	//marker.openInfoWindow(iw);
setTimeout(function(){ // 时间
    map.panTo(point);
	}, 1200);
marker.setAnimation(BMAP_ANIMATION_DROP);	
});
$(function(){
  $('#conte').masonry({
    itemSelector : '.col',
    columnWidth : 210 
  });
});
</script>
<script type="text/javascript" src="http://sta.in1001.com/lib/jquery/jquery.masonry.js"></script>
<script type="text/javascript" src="http://sta.in1001.com/lib/jquery/jquery.infinitescroll.js"></script>

</html>

<?php }} ?>