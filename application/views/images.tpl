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
<strong>城市</strong>:	
{foreach from=$imagecity item=item key=key}
<a href="/show/images?city={$item.city}" {if $city eq $item.city}style="color:red;font-weight:bold;"{/if}>{$item.city}</a>
{/foreach}
</div>
	<br>
<div class="stile">
<strong>关键字</strong>:	
{foreach from=$keywordlist item=item key=key}
	<a href="/show/images?city={$item.city}&keyword={$item.keyword}"{if $keyword eq $item.keyword}style="color:red;font-weight:bold;"{/if}>{$item.keyword}</a>
{/foreach}
(提示:点击对号或者错号图片 状态:错号为未选中 对号为选中)
</div>
<div id="container">
	{foreach from=$imagelist item=item key=key}
	<div class="col">
		<a target="_blank" href="http://ybma.google.in1001.com/{$item.type}/{$item.city}/{$item.keyword}/{$item.filename}"><img style="height:200px;"src="http://ybma.google.in1001.com/{$item.type}/{$item.city}/{$item.keyword}/{$item.filename}" width="300">
		<div class="chicun"><span>{$item.width}x{$item.height}</span></div>
		<a href=javascript:; onclick="choose('{$item.choose}',{$item.id});" ><div class="choose" id="img{$item.id}"><img src="/sta/images/bg/{$item.choose}.jpg" style="width:30px;"></div></a></a>
		<span>{$item.note}</span><br>
		{if $item.reimgurl}图片地址:{$item.reimgurl}{/if}
		手动介绍:<textarea id="rewrite{$item.id}" onblur="rewrite({$item.id})" style="resize:none;width:200px;height:80px;">{$item.rewrite}</textarea>	
	</div>
	{/foreach}	
</div>
<script type="text/javascript" src="http://sta.in1001.com/lib/jquery/jquery.masonry.js"></script>
<script type="text/javascript" src="http://sta.in1001.com/lib/jquery/jquery.infinitescroll.js"></script>
<script type="text/javascript">
$(function(){
  $('#container').masonry({
    itemSelector : '.col',
    columnWidth : 310 
  });
});
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
function rewrite(id){
	var s = $("#rewrite"+id).val();
	url = "http://travel.ymsun.in1001.com/show/setwrite?id="+id+"&content="+s;
	$.get(
		url,
		{},
		function(fuck){
			$("#rewrite"+id).html(fuck);
			location.reload();
		}
	);
}
</script>
</body>
</html>

