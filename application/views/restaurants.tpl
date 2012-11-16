<!DOCTYPE html>
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
{foreach from=$prolist item=item key=key}
	<span  style="width: 50px;"> <a href="/show/restaurants?pid={$item.id}"> 
	{if $item.id eq $pid}
	<font color="#ff0000">{$item.name}</font>
	{else}
	{$item.name}
	{/if}</a></span>
{/foreach}
	<Br>
	<br>
{foreach from=$citylist item=item key=key}
	<span  style="width: 50px;"> <a href="/show/restaurants?cid={$item.id}">
	{if $item.id eq $cid}
	<font color="#ff0000">{$item.name}</font>
	{else}
	{$item.name}
	{/if}
	</a></span>
{/foreach}
	<br>
	<br>
{foreach from=$cityerlist item=item key=key}
	<span  style="width: 50px;"> <a href="/show/restaurants?cid={$item.id}">
	{if $item.id eq $cid}
	<font color="#ff0000">{$item.name}</font>
	{else}
	{$item.name}
	{/if}
	</a></span>
{/foreach}
	<br>
	<br>
{foreach from=$tage item=item key=key}
	<span  style="width: 50px;"> 	{if $key eq $cityname}
	{foreach from=$item  item=foodword key=type}
	{if $type neq '美食聚集地'}
	<font>{$type}:</font>
		{foreach from=$foodword  item=value key=k}
		<font><a {if $keyword eq $value}style="color:red;" {/if}href="/show/restaurants?cid={$cid}&foodtype={$type}&keyword={$value}">{$k}</a></font>
		{/foreach}
	<br>
	{/if}
	{/foreach}
	{/if}
	</span>
{/foreach}
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
		{foreach from=$rest item=item key=key}
		<li style="float:left;width:300px;height:600px;margin:5px;position:relative;">
			<img src="{$item.cover}"><br>
			<a href=javascript:; onclick="choose('{$item.choose}',{$item.id});" ><div class="choose" id="img{$item.id}"><img src="/sta/images/bg/{$item.choose}.jpg" style="width:30px;"></div></a></a>
			<strong>饭店</strong>:{$item.name}<br>
			<strong>店面</strong>:{$item.subname}<br>
			<strong>等级</strong>:{$item.grade}<br>
			<strong>电话</strong>:{$item.phone}<br>
			<strong>price</strong>:{$item.price}<br>
			<strong>口味</strong>:{$item.t_score}<br>
			<strong>环境</strong>:{$item.e_score}<br>
			<strong>服务</strong>:{$item.s_score}<br>
			<strong>价格</strong>:{$item.price}<br>
			<strong>地址</strong>:{$item.address}<br>
			<strong>公交</strong>:{$item.bus}<br>
			<strong>自行</strong>:{$item.subway}<br>
			<strong>时间</strong>:{$item.opentime}<br>
			<strong>停车</strong>:{$item.park}<br>
			<strong>菜系</strong>:{$item.cuisines}<br>
			<strong>特色</strong>:{$item.feature}<br>
			<strong>网友推荐菜</strong>:{$item.recommend_foods}<br>
			<strong>类型</strong>:{$item.atmosphere}<br>
			<strong>图片</strong>:<a target="_blank" href="/show/restimages?id={$item.id}">查看</a><br>
		{/foreach}
	</ul>		
</div>
<div>{$page}</div>
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

