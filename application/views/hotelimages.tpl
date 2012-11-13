
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
	width:120px;;
	background:#ececec;
	margin:5px;
	text-align:center;
}
</style>
<body>
{foreach from=$hotelimage item=item key=key}
<div class="content">
<strong>饭店</strong>:{$item.name}<br>
</div>
<div id="container" class="highslide-gallery" >
	{foreach from=$item.photos item=photos }
		<div class="col">
			<a class='highslide' href='{$photos}' onclick="return hs.expand(this)">
<img src='{$photos}' style="width:100px;"/></a>	
		</div>
	{/foreach}
</div>
{/foreach}
<script type="text/javascript">
$(function(){
  $('#container').masonry({
    itemSelector : '.col',
    columnWidth : 130 
  });
});
</script>
</body>
</html>

