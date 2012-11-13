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
	<span  style="width: 50px;"> <a href="/show/hotel?pid={$item.id}"> 
	{if $item.id eq $pid}
	<font color="#ff0000">{$item.name}</font>
	{else}
	{$item.name}
	{/if}</a></span>
{/foreach}
	<Br>
	<br>
{foreach from=$citylist item=item key=key}
	<span  style="width: 50px;"> <a href="/show/hotel?cid={$item.id}">
	{if $item.id eq $cid}
	<font color="#ff0000">{$item.name}</font>
	{else}
	{$item.name}
	{/if}
	</a></span>
{/foreach}
</div>
<div class="content">
	<ul>
		{foreach from=$hotel item=item key=key}
		<li style="float:left;width:300px;height:400px;margin:5px;">
			<img src="{$item.cover}"><br>
			<strong>酒店</strong>:{$item.name}<br>
			<strong>类型</strong>:{$item.cate}<br>
			<strong>满意度</strong>:{$item.manyidu}<br>
			<strong>价格</strong>:{$item.price}<br>
			<strong>地址</strong>:{$item.sectionName} {$item.address} {$item.street_address}<br>
			<strong>介绍</strong>:{$item.intro}<br>
			<strong>图片</strong>:<a target="_blank" href="/show/hotelimages?id={$item.id}">查看</a><br>
		</li>
		{/foreach}
	</ul>		
</div>
<div>{$page}</div>
</body>
</html>

