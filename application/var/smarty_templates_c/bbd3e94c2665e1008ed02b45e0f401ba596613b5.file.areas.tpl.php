<?php /* Smarty version Smarty-3.1.6, created on 2012-10-16 01:18:33
         compiled from "application/views/areas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48319603250383ae1055058-58032020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbd3e94c2665e1008ed02b45e0f401ba596613b5' => 
    array (
      0 => 'application/views/areas.tpl',
      1 => 1350321509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48319603250383ae1055058-58032020',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_50383ae11984a',
  'variables' => 
  array (
    'prolist' => 0,
    'item' => 0,
    'pid' => 0,
    'citylist' => 0,
    'cid' => 0,
    'area' => 0,
    'area_traffic' => 0,
    'area_dining' => 0,
    'area_geo_his' => 0,
    'area_desc' => 0,
    'area_useful' => 0,
    'area_goods' => 0,
    'area_business' => 0,
    'area_shopping_desc' => 0,
    'arealist' => 0,
    'road' => 0,
    'page' => 0,
    'jsonmap' => 0,
    'cent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50383ae11984a')) {function content_50383ae11984a($_smarty_tpl) {?><!DOCTYPE html>
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
</style>

	</head>
	<body>
		<div id="blue" style="height: 756px;">
		<div class="main-con" style="width: auto; margin: auto;"> 
			<div id="table_height" class="box-left">


		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['prolist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<span  style="width: 50px;"> <a href="/show/index?pid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> 

<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['pid']->value){?>
<font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</font>
<?php }else{ ?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

<?php }?>
</a></span>
		<?php } ?>
		<Br>
		<br>
		<!--http://travel.ymsun.in1001.com/show/index?pid=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
-->
		<form id="search" action="http://travel.ymsun.in1001.com/show/ajax?" method="post" style="margin-bottom: 11px;" onsubmit="return check();">
		<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
" name="cid">
		<span style="font-size:18px;color:green;">景点名称</span>:<input value=""id="find" name="find"><input type="submit"  name="submit"value="查询"> 
		</form>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['citylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<span  style="width: 50px;"> <a href="/show/index?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
<?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['cid']->value){?>
<font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</font>
<?php }else{ ?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

<?php }?>
</a></span>
		<?php } ?>
	<?php if ($_smarty_tpl->tpl_vars['area']->value['name']){?><br><br><br>
	<span style="font-size:18px;font-weight:bold;color:red;"><?php echo $_smarty_tpl->tpl_vars['area']->value['name'];?>
</span>
等级:<?php echo $_smarty_tpl->tpl_vars['area']->value['star'];?>

	<br>
	 <a href=javascript:; id="dison" onclick="dison();">详情</a> <a href=javascript:; id="disdm" style="display:none;" onclick='disdm();'>关闭</a>
	<br>
	<?php }?>
<div id='ssi' style="display:none;">
	<strong>介绍</strong>:<?php echo $_smarty_tpl->tpl_vars['area']->value['abstract'];?>
 <br>
<?php if ($_smarty_tpl->tpl_vars['area_traffic']->value){?>
	<strong>交通</strong>:<br>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['area_traffic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['item']->value['name']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
:&nbsp;&nbsp;&nbsp;<?php }?><?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
<br>
	<?php } ?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['area_dining']->value){?>
	<strong>美食</strong>:<br>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['area_dining']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['item']->value['name']){?><b style="font-size:18px;color:green;">	<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</b>:&nbsp;&nbsp;&nbsp;<?php }?><?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
<br>
	<?php } ?>
<?php }?>
	<strong>文化历史</strong>:
<?php if ($_smarty_tpl->tpl_vars['area_geo_his']->value){?>
	<br>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['area_geo_his']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
——<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
 <br>
<?php } ?>
<?php }else{ ?>
	暂无数据<br>
<?php }?>
	<strong>小贴士</strong>:
<?php if ($_smarty_tpl->tpl_vars['area_desc']->value){?>
<?php echo $_smarty_tpl->tpl_vars['area_desc']->value;?>
<br> 
<?php }else{ ?>
	暂无数据<br>
<?php }?>
	<strong>实用信息</strong>:
<?php if ($_smarty_tpl->tpl_vars['area_useful']->value){?>
<br>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['area_useful']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
：
<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
<br> 
<?php } ?>
<?php }else{ ?>
暂无数据<br>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['area_goods']->value){?>
	<strong>购物与美食</strong>:
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['area_goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
：
<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
<br> 
<?php } ?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['area_business']->value){?>
<br>
	<strong>购物与商业</strong>:
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['area_business']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
：
<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
<br> 
<?php } ?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['area_shopping_desc']->value){?>
	<strong>购物简介</strong>:
<?php echo $_smarty_tpl->tpl_vars['area_shopping_desc']->value;?>
<br> 
<?php }?>
</div>


		
<?php if (count($_smarty_tpl->tpl_vars['arealist']->value)==0){?> 
<br> <br> <br> <br> <br> <br>
暂无景区数据 ！

<?php }else{ ?>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arealist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<a href="/show/showarea?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" target="_blank">
<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

</a>
							<b class="start4-5"></b><span ><a  class="clmap" tid="<?php echo $_smarty_tpl->tpl_vars['item']->value['hid'];?>
" lant="<?php echo $_smarty_tpl->tpl_vars['item']->value['lat'];?>
" long="<?php echo $_smarty_tpl->tpl_vars['item']->value['lgt'];?>
">地图</a></span>
							<b class="start4-5"></b><span onclick="searchhost('<?php echo $_smarty_tpl->tpl_vars['item']->value['lgt'];?>
|<?php echo $_smarty_tpl->tpl_vars['item']->value['lat'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');"><a >附近酒店</a></span>
						</h3>
						</dd>
						<dd > <?php if ($_smarty_tpl->tpl_vars['item']->value['opentime']){?><span>开放时间</span>：『<?php echo $_smarty_tpl->tpl_vars['item']->value['opentime'];?>
』 <?php }?></dd>
						<dd > <?php if ($_smarty_tpl->tpl_vars['item']->value['tag']){?>标签：『<?php echo $_smarty_tpl->tpl_vars['item']->value['tag'];?>
』 <?php }?></dd>
						<dd > <?php if ($_smarty_tpl->tpl_vars['item']->value['feature']){?>特色：『<?php echo $_smarty_tpl->tpl_vars['item']->value['feature'];?>
』 <?php }?></dd>
						<dd style="text-indent:2em;"><?php echo $_smarty_tpl->tpl_vars['item']->value['abstract'];?>
<a href="/show/showarea?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" target="_blank">更多</a></dd>
						
					</dl>
				</div>
		<?php } ?>

<?php }?>

			
		</div>
		</div>
<div id ="guding">
<div class = "f">
			<div>起点：
        <?php echo $_smarty_tpl->tpl_vars['road']->value['start'];?>

                 终点：
		<?php echo $_smarty_tpl->tpl_vars['road']->value['end'];?>

                 <button onclick="resultRoute();">路线</button>	
				 <button onclick="resultRresh();">清屏</button>
            </div>
			<div id="locate" style="font-size: 15px; color: red;"></div>
			<div  style="float:center;width:540px;height:540px;border:1px solid gray;margin-top: 33px;" id="container"></div>

			<div id="results" style="width: 540px; height:200px; overflow:auto;position: absolute; top: 540px;font-color:#333333;"></div>
</div>
</div>
<div class="highslide-maincontent"></div>
<div class="page" style="clear: both; margin: auto; width:694px; margin-bottom:30px;"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
</body>
	
	<script type="text/javascript">
	//  标注点数组
	
var BASEDATA = <?php echo $_smarty_tpl->tpl_vars['jsonmap']->value;?>

	
	//创建和初始化地图函数：
	function initMap(){
		window.map = new BMap.Map("container");
	
	<?php if ($_smarty_tpl->tpl_vars['cent']->value['lati']==0||$_smarty_tpl->tpl_vars['cent']->value['lati']==''){?>
		alert("地图尚无信息");
	<?php }?>
		map.centerAndZoom(new BMap.Point(<?php echo $_smarty_tpl->tpl_vars['cent']->value['long'];?>
,<?php echo $_smarty_tpl->tpl_vars['cent']->value['lati'];?>
),11); //景区中心经纬度
	
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
		var label = new BMap.Label(json.title,{"offset":new BMap.Size(9,-20)});
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
	var icon = new BMap.Icon("http://dev.baidu.com/wiki/static/map/API/examples/images/ico-1-9.png", new BMap.Size(28,37),{imageOffset: new BMap.Size(0 - i * 28, 0),infoWindowAnchor:new BMap.Size(100,100),anchor:new BMap.Size(6,0)})
		return icon;
}
function searchhost(point,name){
	var s0 = point.split("|")[0];//纬度
		var s1 = point.split("|")[1];//精度
			var host = new BMap.Point(s0,s1);
				var local = new BMap.LocalSearch(map, {
renderOptions:{map: map, autoViewport:true}
	});
	local.searchNearby("酒店", host);
	$("#locate").text("");
	$("#locate").append("<span>当前展示的是：  "+name+"的附近酒店</span>");
}

function resultRoute(){
	 var spoint =$("#start").find("option:selected").text();
	 var epoint =$("#end").find("option:selected").text();
	var start = $("#start").val();
	var end = $("#end").val();
	alert(start);
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
	$("#locate").text("");
	$("#locate").append("<span>当前展示的是从：  "+spoint+"到"+epoint+"的路线</span>");
	//initMap();
}
initMap();//创建和初始化地图
//触发地图
$(".clmap").click(function(){
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
marker.setAnimation(BMAP_ANIMATION_DROP);	
	}, 100);
map.setZoom(11); //设置地图缩放等级
$("#locate").text("");
	$("#locate").append("<span>当前位置是：  "+BASEDATA[i-1].title+"</span>");
});
function resultRresh(){
	var transit = new BMap.TransitRoute(map, {
renderOptions: {map: map,panel:"results"},
	  policy:BMAP_TRANSIT_POLICY_AVOID_SUBWAYS,
	  	  pageCapacity:3
		  	});
		transit.clearResults() 
				initMap();
}
function dison(){
	var div = document.getElementById('ssi');
	var dison = document.getElementById('dison');
	var disdm = document.getElementById('disdm');
	div.style.display="block";
	dison.style.display="none";
	disdm.style.display="block";
}
function disdm(){
	var div = document.getElementById('ssi');
	var dison = document.getElementById('dison');
	var disdm = document.getElementById('disdm');
	div.style.display="none";
	dison.style.display="block";
	disdm.style.display="none";
}
function check(){
	var ccname = document.getElementById('find').value;
	if(ccname==''){
		return false;
	}
}
</script>

</html>

<?php }} ?>