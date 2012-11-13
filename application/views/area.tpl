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
			<img src="{$ainfo.cover}"> <br><br>
			<b>当前景区</b>：{$ainfo.name} 评价:<b style="color:red;">{$ainfo.level}</b><br><br>
			{if $ainfo.feature}<strong>特色</strong>:{$ainfo.feature}<br>{/if}
			<strong>标签</strong>: {$ainfo.tag}</b><br>
			<strong>景区类型</strong>: {$ainfo.type}</b><br>
			<strong>地址</strong>: {$ainfo.address}<br>
			<strong>最佳玩游时间</strong>:{$ainfo.be_visit_time}<br>
			<strong>开放时间</strong>: {if $ainfo.opentime eq '-'} 暂无数据 {else} {$ainfo.opentime} {/if}<br>
			<strong>门票</strong>: {$ainfo.price}<br>
			{if $ainfo.price_disc}<strong>门票描述</strong>: {$ainfo.price_disc}<br>{/if}
			<strong>建议玩游时间</strong>:{if $ainfo.time}{$ainfo.time}小时{else}暂无数据{/if}<br>
			<strong>简介</strong>:<pre style=" white-space: pre-wrap;">{$ainfo.intro}</pre>
			<strong>交通</strong>:<br>	
				{if $scene_traffic}
				{$scene_traffic}
				{else}
				暂无数据 <br>
				{/if}
			<strong>饮食</strong>：{if $scene_dining} {$scene_dining.desc} {else}暂无数据{/if} <br>
			<strong>电话</strong>：{$ainfo.phone}<br>
		{if $scene_line}
		{foreach from=$scene_line item=item key=key}
			<strong>{$item.name}</strong>：	{$item.desc} <br>
		{/foreach}
		{/if}
			<strong>文化历史</strong>:
		{if $scene_geo_his}
			<br>
		{foreach from=$scene_geo_his item=item key=key}
			{$item.name}--{$item.desc} <br>
		{/foreach}
		{else}
			暂无数据<br>
		{/if}
			<!--<strong>周边</strong>:
		{if $scene_around_scene}
		{foreach from=$scene_around_scene item=item key=key}
		{$item.sname}&nbsp; &nbsp;&nbsp;
		{/foreach}
		<br>
		{else}
			暂无数据<br>
		{/if}-->
			<strong>小贴士</strong>:<br>
		{if $scene_attention}
		{$scene_attention.desc}<br> 
		{else}
			暂无数据<br>
		{/if}
			<strong>实用信息</strong>:<br>
		{if $scene_useful}
			{$scene_useful}	
		{else}
			暂无数据<br>
		{/if}
		{if $scene_goods}
		<strong>购物关于美食</strong>:
		{foreach from=$scene_goods item=item key=key}
		&nbsp;&nbsp;&nbsp;&nbsp;{$item.name}：
		{$item.desc}<br> 
		{/foreach}
		{/if}
		{if $scene_business}
		<br>
		<strong>购物关于商业</strong>:
		{foreach from=$scene_business item=item key=key}
		&nbsp;&nbsp;&nbsp;&nbsp;{$item.name}：
		{$item.desc}<br> 
		{/foreach}
		{/if}
		{if $scene_shopping_desc}
		<strong>购物简介</strong>:
		{$scene_shopping_desc}<br> 
		{/if}
		<Br> <Br> <Br>
		<div id="conte">
			<ul>
			{foreach from=$scene_pic item=item key-key}
				<li class="col"><a href="{$item}" target="_blank"><img src="{$item}"style="height:200px;" ></a></li>

			{/foreach}
			</ul>
		</div>
{if $sinfo|@count eq 0 } 
<br> <br> <br> <br> <br> <br>
暂无景点数据 ！

{else}
<div style="clear:both;"></div>
景点列表 ：
		{foreach from=$sinfo item=item key=key}

				<div class="clearfix" spot="" tid="{$item.hid}" lant="{$item.lat}" long="{$item.lgt}">
					<dl class="area-list mt30">
						<dt><a href="{$item.image}"  class="highslide" onclick="return hs.expand(this)"><img src="{$item.image}" height="99px" width="99px"></a></dt>
						<dd class="f14 mbm5"><b class="ico-map col-white fontw pr5 fal">{$item.hid}</b>
<!--// <a href="/show/showpoints?sid={$item.id}" target="_blank">
{$item.name}
</a>-->{$item.name}
							<b class="start4-5"></b>
						</h3>
						</dd>
						票价: {if $item.price eq '0'} 暂无数据 {else} {$item.price} {/if} <br>
						开放时间: {if $item.opentime eq '-'} 暂无数据 {else} {$item.opentime} {/if} <br>
						<dd>{$item.abstract}<!--<a href="/show/showpoints?sid={$item.id}" target="_blank">更多</a>--></dd>
						
					</dl>
				</div>

		{/foreach}
{/if}


			
		</div>
		</div>
<div id ="guding">
<div class = "f">
			<div style="float:right;width:420px;height:640px;border:1px solid gray;margin-top: 33px;" id="container"></div>
</div>
</div>
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
		map.centerAndZoom(new BMap.Point({$cent.long},{$cent.lati}),15); //景区中心经纬度
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
{/literal}
</html>

