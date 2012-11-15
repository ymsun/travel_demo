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
	width:220px;;
	background:#ececec;
	margin:5px;
	text-align:center;
}
.choose{
	position:absolute;
	top:0;
	left:0;
	z-index:1;
	opacity:0.8;
}
</style>
<body>
<div class="content">
<strong>景点名称</strong>:{$placename}<br>
</div>
<div id="container" class="highslide-gallery" >
	{foreach from=$placelist item=item key=key }
		<div class="col">
			<a class='highslide' href='{$item.path}?size=600' onclick="return hs.expand(this)">
<img src='{$item.path}' style="width:220px;height:200px;"/></a>	
		<a href=javascript:; onclick="choose({$item.id});" ><div class="choose" id="img{$item.id}"><img src="/sta/images/bg/{$item.choose}.jpg" style="width:30px;"></div></a></a>
		</div>
	{/foreach}
</div>
<script type="text/javascript">
$(function(){
  $('#container').masonry({
    itemSelector : '.col',
    columnWidth : 230 
  });
});
function choose(id){
	var statue = $('.choose img')[0].src;
	var s = statue.substr(-5,1);
	if(s=="w"){
		s="r";
	}else{
		s="w";
	}
	url = "http://backtage.com/show/setjieimg?id="+id+"&statue="+s;
	$.get(
		url,
		{},
		function(fuck){
			$("#img"+id).html(fuck);
			//location.reload();
		}
	);
}
</script>
</body>
</html>

