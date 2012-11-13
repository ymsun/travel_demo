<!DOCTYPE html>
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


		{foreach from=$prolist item=item key=key}
		<span  style="width: 50px;"> <a href="/show/index?pid={$item.id}"> 

{if $item.id eq $pid}
<font color="#ff0000">{$item.name}</font>
{else}
{$item.name}
{/if}
</a></span>
		{/foreach}
		<Br>
		<br>
		<!--http://travel.ymsun.in1001.com/show/index?pid={$pid}-->
		<form id="search" action="http://travel.ymsun.in1001.com/show/ajax?" method="post" style="margin-bottom: 11px;" onsubmit="return check();">
		<input type="hidden" value="{$pid}" name="cid">
		<span style="font-size:18px;color:green;">景点名称</span>:<input value=""id="find" name="find"><input type="submit"  name="submit"value="查询"> 
		</form>
		{foreach from=$citylist item=item key=key}
		<span  style="width: 50px;"> <a href="/show/index?cid={$item.id}">
{if $item.id eq $cid}
<font color="#ff0000">{$item.name}</font>
{else}
{$item.name}
{/if}
</a></span>
		{/foreach}
	{if $area.name}<br><br><br>
	<span style="font-size:18px;font-weight:bold;color:red;">{$area.name}</span>
等级:{$area.star}
	<br>
	 <a href=javascript:; id="dison" onclick="dison();">详情</a> <a href=javascript:; id="disdm" style="display:none;" onclick='disdm();'>关闭</a>
	<br>
	{/if}
<div id='ssi' style="display:none;">
	<strong>介绍</strong>:{$area.abstract} <br>
{if $area_traffic}
	<strong>交通</strong>:<br>
	{foreach from=$area_traffic item=item key=key}
	&nbsp;&nbsp;{if $item.name}{$item.name}:&nbsp;&nbsp;&nbsp;{/if}{$item.desc}<br>
	{/foreach}
{/if}
{if $area_dining}
	<strong>美食</strong>:<br>
	{foreach from=$area_dining item=item key=key}
	&nbsp;&nbsp;{if $item.name}<b style="font-size:18px;color:green;">	{$item.name}</b>:&nbsp;&nbsp;&nbsp;{/if}{$item.desc}<br>
	{/foreach}
{/if}
	<strong>文化历史</strong>:
{if $area_geo_his}
	<br>
{foreach from=$area_geo_his item=item key=key}
	{$item.name}——{$item.desc} <br>
{/foreach}
{else}
	暂无数据<br>
{/if}
	<strong>小贴士</strong>:
{if $area_desc}
{$area_desc}<br> 
{else}
	暂无数据<br>
{/if}
	<strong>实用信息</strong>:
{if $area_useful}
<br>
{foreach from=$area_useful item=item key=key}
&nbsp;&nbsp;&nbsp;&nbsp;{$item.name}：
{$item.desc}<br> 
{/foreach}
{else}
暂无数据<br>
{/if}
{if $area_goods}
	<strong>购物与美食</strong>:
{foreach from=$area_goods item=item key=key}
{$item.name}：
{$item.desc}<br> 
{/foreach}
{/if}
{if $area_business}
<br>
	<strong>购物与商业</strong>:
{foreach from=$area_business item=item key=key}
{$item.name}：
{$item.desc}<br> 
{/foreach}
{/if}

{if $area_shopping_desc}
	<strong>购物简介</strong>:
{$area_shopping_desc}<br> 
{/if}
</div>


		
{if $arealist|@count eq 0 } 
<br> <br> <br> <br> <br> <br>
暂无景区数据 ！

{else}
		{foreach from=$arealist item=item key=key}
				<div class="clearfix" spot="" tid="{$item.hid}" lant="{$item.lat}" long="{$item.lgt}">
					<dl class="area-list mt30">
						<dt><a href="{$item.image}"  class="highslide" onclick="return hs.expand(this)"><img src="{$item.image}" height="99px" width="99px"></a></dt>

						<dd class="f14 mbm5"><b class="ico-map col-white fontw pr5 fal">{$item.hid}</b>
<a href="/show/showarea?aid={$item.id}" target="_blank">
{$item.name}
</a>
							<b class="start4-5"></b><span ><a  class="clmap" tid="{$item.hid}" lant="{$item.lat}" long="{$item.lgt}">地图</a></span>
							<b class="start4-5"></b><span onclick="searchhost('{$item.lgt}|{$item.lat}','{$item.name}');"><a >附近酒店</a></span>
						</h3>
						</dd>
						<dd > {if $item.opentime}<span>开放时间</span>：『{$item.opentime}』 {/if}</dd>
						<dd > {if $item.tag}标签：『{$item.tag}』 {/if}</dd>
						<dd > {if $item.feature}特色：『{$item.feature}』 {/if}</dd>
						<dd style="text-indent:2em;">{$item.abstract}<a href="/show/showarea?aid={$item.id}" target="_blank">更多</a></dd>
						
					</dl>
				</div>
		{/foreach}

{/if}

			
		</div>
		</div>
<div id ="guding">
<div class = "f">
			<div>起点：
        {$road.start}
                 终点：
		{$road.end}
                 <button onclick="resultRoute();">路线</button>	
				 <button onclick="resultRresh();">清屏</button>
            </div>
			<div id="locate" style="font-size: 15px; color: red;"></div>
			<div  style="float:center;width:540px;height:540px;border:1px solid gray;margin-top: 33px;" id="container"></div>

			<div id="results" style="width: 540px; height:200px; overflow:auto;position: absolute; top: 540px;font-color:#333333;"></div>
</div>
</div>
<div class="highslide-maincontent"></div>
<div class="page" style="clear: both; margin: auto; width:694px; margin-bottom:30px;">{$page}</div>
</body>
	{literal}
	<script type="text/javascript">
	//  标注点数组
	{/literal}
var BASEDATA = {$jsonmap}
	{literal}
	//创建和初始化地图函数：
	function initMap(){
		window.map = new BMap.Map("container");
	{/literal}
	{if $cent.lati==0||$cent.lati==""}
		alert("地图尚无信息");
	{/if}
		map.centerAndZoom(new BMap.Point({$cent.long},{$cent.lati}),11); //景区中心经纬度
	{literal}
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
{/literal}
</html>

