<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>demo</title>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
		<link href="/sta/style/common.css" type="text/css" rel="stylesheet">
		<link href="/sta/style/frame.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/sta/js/highslide-full.js"></script>
<link rel="stylesheet" href="/sta/style/highslide.css" type="text/css" />
<script type="text/javascript" src="/sta/js/jquery-1.8.0.min.js"></script>
	</head>
	<body>
		<div id="blue" style="height: 756px;">
		<div class="main-con" style="width: 1041px; margin: auto;"> 
			<div id="table_height" class="box-left">

{if $points|@count eq 0 } 
<br> <br> <br> <br> <br> <br>
暂无景点数据 ！

{else}


		{foreach from=$points item=item key=key}

				<div class="clearfix" spot="" tid="{$item.hid}" lant="{$item.longitude}" long="{$item.latitude}">
					<dl class="area-list mt30">
						<dt><a href="{$item.image}"  class="highslide" onclick="return hs.expand(this)"><img src="{$item.image}" height="99px" width="99px"></a></dt>
						<dd class="f14 mbm5"><b class="ico-map col-white fontw pr5 fal">{$item.hid}</b>
{$item.name}
							<b class="start4-5"></b>
						</h3>
						</dd>
						<dd>{$item.note}</dd>
						
					</dl>
				</div>

		{/foreach}
{/if}


			
		</div>
		</div>
			<div style="float:right;width:420px;height:640px;border:1px solid gray;margin-top: 33px;" id="container"></div>
</body>	{literal}
	<script type="text/javascript">
	//  标注点数组
	{/literal}
var BASEDATA = {$jsonmap}
	{literal}
	//创建和初始化地图函数：
	function initMap(){
		window.map = new BMap.Map("container");
	{/literal}
		map.centerAndZoom(new BMap.Point({$cent.lati},{$cent.long}),16); //景区中心经纬度
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
	var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div style='float:right;margin: 6px;'><img width='50' src='" + json.image + "'></div><div class='iw_poi_content'></div>");
	return iw;
}
//创建一个Icon
function createIcon(i){//创建标签信息
	var icon = new BMap.Icon("http://dev.baidu.com/wiki/static/map/API/examples/images/ico-1-9.png", new BMap.Size(28,37),{imageOffset: new BMap.Size(0 - i * 28, 0),infoWindowAnchor:new BMap.Size(15,0),anchor:new BMap.Size(6,0)})
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
</script>
{/literal}
</html>

