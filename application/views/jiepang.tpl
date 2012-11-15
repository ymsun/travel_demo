<!DOCTYPE html>
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
{foreach from=$prolist item=item key=key}
	<span  style="width: 50px;"> <a href="/show/jiepang?pid={$item.id}"> 
	{if $item.id eq $pid}
	<font color="#ff0000">{$item.name}</font>
	{else}
	{$item.name}
	{/if}</a></span>
{/foreach}
	<Br>
	<br>
{foreach from=$citylist item=item key=key}
	<span  style="width: 50px;"> <a href="/show/jiepang?cid={$item.id}">
	{if $item.id eq $cid}
	<font color="#ff0000">{$item.name}</font>
	{else}
	{$item.name}
	{/if}
	</a></span>
{/foreach}
	<br>
	<br>
{foreach from=$arealist item=item key=key}
	<span  style="width: 50px;"> <a href="/show/jiepangimg?id={$item.id}&name={$item.name}">
	{$item.name}
	</a></span>
{/foreach}
	<br>
	<br>
(提示:点击对号或者错号图片 状态:错号为未选中 对号为选中)
</div>
</body>
</html>

