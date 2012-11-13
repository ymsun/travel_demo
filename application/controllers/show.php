<?php
class Show extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('api');
		$this->apihost = $this->config->item('api_host');
	
	}
	
	function _reid($arrs){
		$ret = array();
		foreach($arrs as $k =>$v){
			$ret[$v['id']] = $v;
		}
		return $ret;
	}

	function _retude($tude){
		$ret = $tude;//3600000;
		return $ret;
	
	}
	function _json_to_array($web){
			$arr=array();
			foreach((array)$web as $k=>$w){
					if(is_object($w)) { 
						$arr[$k]= $this->_json_to_array($w); //判断类型是不是object
					}else {
						$arr[$k]=$w;
					}
			}
			return $arr;
	}

	
	function index($cid='',$page=0){		
		//echo $this->config->item('api_host');
		$prolist = $this->api->request($this->apihost.'/provinces');
		$prolist['httpcode']== 200 ?$prolist = $prolist['data']['items']:exit('api error1');
		$prolist = $this->_reid($prolist);

		if(isset($_GET['cid'])&&strlen($_GET['cid'])){
			$pid = $this->api->request($this->apihost.'/getpidbycid/'.(int)$_GET['cid']);
			$pid = $pid['data']['items']['0']['pid'];
			$cid = (int)$_GET['cid'];
		}
		elseif(isset($_GET['pid'])&&strlen($_GET['pid'])){

			$pid = (int)$_GET['pid'];


		}
		else{
			$pid = 2;
		
		}
		//cid 优先，有cid先取cid ，没有的话再取pid，再没有取默认pid =2 

		$citylist = $this->api->request($this->apihost.'/province/'.$pid.'/cities');
		$citylist['httpcode']== 200 ?$citylist = $citylist['data']['items']:exit('api error2');
		$citylist = $this->_reid($citylist);
		if($cid==''){
			if(isset($_GET['cid'])&&strlen($_GET['cid'])){
				$cid = (int)$_GET['cid'];
			}
			else{
			$cid = array_rand($citylist);
			}
		}
		// info of pro
		$pro_info = $prolist[$pid];

		//info if city
		if($page==''){
			$page =(isset($_GET['per_page']))?(int)$_GET['per_page'] : 0;
			if($page!=0){
				$page =$page - 1;
			}
		}
		$pcid = isset($_POST['cid'])? $_POST['cid']: ''; 
		$ccname = isset($_POST['find'])? $_POST['find']: ''; 
		if($ccname){
		$arealist = $this->api->request($this->apihost.'/search?name='.$ccname.'&page='.$page.'&pid='.$pcid);
		$config['base_url'] = 'http://travel.ymsun.in1001.com/search/index?cid='.$cid.'&pid='.$pcid.'&ccname='.$ccname;
		}else{
		$arealist = $this->api->request($this->apihost.'/city/'.$cid.'/areas/'.$page);
		$config['base_url'] = 'http://travel.ymsun.in1001.com/show/index?cid='.$cid;

		}
		$rows = $arealist['data']['rows'];
		$arealist['httpcode']== 200 ?$arealist = $arealist['data']['items']:exit('api error3');
		$arrmap = array();
		$this->load->library('pagination');
		$config['total_rows'] = $rows;
		$config['per_page'] = 10; 
		$config['num_links'] = 3;
		$config['uri_segment'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$this->pagination->initialize($config); 
		$road = array();
		$length = 0;
		if(count($arealist)){
			$centtude = array(
				'long' => '0',
				'lati' => '0',
			);
			foreach($arealist as $k =>$v){
				$arealist[$k]['hid'] = (int)($k+1);
				if($k >3){
					//unset($arealist[$k]);
				}
				//$arealist[$k]['longitude'] = $this->_retude($v['latitude']);
				//$arealist[$k]['latitude'] = $this->_retude($v['longitude']);
				$centtude['long'] += $arealist[$k]['lgt'];
				$centtude['lati'] += $arealist[$k]['lat'];
				$arrmap[] = array(
					'title' => $v['name'],
					'content' =>$v['abstract'],
					'point' =>$arealist[$k]['lat'].'|'.$arealist[$k]['lgt'],
					'image' =>$v['image'],
				);
				$road[$arealist[$k]['lat'].'|'.$arealist[$k]['lgt']]= $v['name'];  
				if($arealist[$k]['lat']=="" || $arealist[$k]['lgt']==""||$arealist[$k]['lat']==0){
					$length++;
				}
			}
			$chear = count($arealist)-$length;
			if($chear==0) $chear = 1;
			$centtude['long'] = $centtude['long']/$chear;
			$centtude['lati'] = $centtude['lati']/$chear;
			//print_r($centtude);
		}
		else{
			$centtude = array(
				'long' => '39.921901',
				'lati' => '116.403023',
			);

		}
		$roadsel = array(
			'start' => $this->api->html_select($road,'start','start'),
			'end' => $this->api->html_select($road,'end','end'),

		);
		$area = $this->api->request($this->apihost.'/getpidbycid/'.$pid);
		$area['httpcode']== 200 ?$area = $area['data']['items']:exit('api error');
		$area_useful =  array();
		$area_attention =  array();
		$area_business =  array();
		$area_goods =  array();
		$area_shopping_desc =  '';
		if($area[0]['traffic']!=""){
			$area_traffic = json_decode($area[0]['traffic'],true);
			$area_traffic = isset($area_traffic['local']); 
		}
		if($area[0]['dining']!=""){
			$area_dining= json_decode($area[0]['dining'],true);
			$area_dining= isset($area_dining['food']); 
		}
		$aaa = array();
		$area = $area[0];	
		if($area['geo_his']!=''&& $area['geo_his']!='""' &&$area['geo_his']!='null'){
			$area_geo_his= json_decode($area['geo_his'], true);
			$area_geo_his= $area_geo_his['list'];
		}
		if($area['shopping']!=''&& $area['shopping']!='""'){
			$area_shopping= json_decode($area['shopping'],true);
			if(isset($area_shopping['goods'])){
				$area_goods = $area_shopping['goods'];
			}
			if(isset($area_shopping['business'])){
				$area_business= $area_shopping['business'];
			}
			if(isset($area_shopping['desc'])){
				$area_shopping_desc= $area_shopping['desc'];
			}
		}
		$area_desc = '';
		if($area['attention']!=''&& $area['attention']!='""'){
			$area_attention = json_decode($area['attention'],true);
			if(!isset($area_attention['desc'])){
				foreach($area_attention['list'] as $k => $v){
					$area_desc .= $v['desc'].'<br>'; 
				}
			}
		}
		if($area['useful']!=''&& $area['useful']!='""'){
			$area_useful= json_decode($area['useful']);
			$area_useful= $this->_json_to_array($area_useful);
			$area_useful= $this->_json_to_array($area_useful['list']);
		}
		$data = array(
			'prolist' =>$prolist,
			'citylist' =>$citylist,
			'pro_info' =>$pro_info,
			'arealist' =>$arealist,
			'jsonmap'  =>json_encode($arrmap),
			'cent'    => $centtude,
			'road' =>$roadsel,
			'pid' =>$pid,
			'cid' =>$cid,
			'area' =>$area,
			'area_traffic' => $area_traffic, 
			'area_dining' => $area_dining, 
			'area_useful' => $area_useful, 
			'area_attention' => $area_attention, 
			'area_desc' => $area_desc,
			'area_goods' => $area_goods, 
			'area_shopping_desc' => $area_shopping_desc, 
			'area_business' => $area_business, 
			'area_geo_his' => $area_geo_his, 
			'page' =>  $this->pagination->create_links(),
		);

		//echo "<pre>"; print_r($arealist);exit;

		$this->smarty->view('areas.tpl',$data);
	}
	function showarea(){		
		strlen($_GET['aid']) ? $aid = (int)$_GET['aid'] : exit('No aid ,exit');
		$areainfo = $this->api->request($this->apihost.'/area/'.$aid);
		$ainfo = $areainfo['data']['items']['0'];
		$scene_pic = array();
		$scene_traffic = array(); 
		$scene_dining = array();
		$scene_line = array(); 
		$scene_geo_his = array(); 
		$scene_around_scene =  array();
		$scene_useful =  array();
		$scene_attention =  array();
		$scene_business =  array();
		$scene_goods =  array();
		$scene_shopping_desc =  '';
		$str_useful =  '';

		$scene_pic = json_decode($ainfo['photos'],true);
		if($ainfo['dining']!=''&& $ainfo['dining']!='""'){
			$scene_dining = json_decode($ainfo['dining']);
			$scene_dining = $this->_json_to_array($scene_dining);
		}	
		if($ainfo['line']!=''&& $ainfo['line']!='""'){
			$scene_line = json_decode($ainfo['line']);
			$scene_line = $this->_json_to_array($scene_line);
			$scene_line = $this->_json_to_array($scene_line['list']);
		}
		if($ainfo['geo_his']!=''&& $ainfo['geo_his']!='""' &&$ainfo['geo_his']!='null'){
			$scene_geo_his= json_decode($ainfo['geo_his']);
			$scene_geo_his= $this->_json_to_array($scene_geo_his);
			$scene_geo_his= $this->_json_to_array($scene_geo_his['list']);
		}

		$scene_around_scene= json_decode($ainfo['around_scene']);
		$scene_around_scene= $this->_json_to_array($scene_around_scene);

		if($ainfo['traffic']!=''&& $ainfo['traffic']!='""'){
			$scene_traffic = json_decode($ainfo['traffic'],true);
			$scene_traffic = $this->get_traffic($scene_traffic);
		}
		if($ainfo['shopping']!=''&& $ainfo['shopping']!='""'){
			$scene_shopping= json_decode($ainfo['shopping'],true);
			if($scene_shopping['goods']){
				$scene_goods = $scene_shopping['goods'];
			}
			if(isset($scene_shopping['business'])){
				$scene_business= $scene_shopping['business'];
			}
			if($scene_shopping['desc']){
				$scene_shopping_desc= $scene_shopping['desc'];
			}
		}

		if($ainfo['attention']!=''&& $ainfo['attention']!='""'){
			$scene_attention = json_decode($ainfo['attention'],true);
			if(!$scene_attention['desc']){
				foreach($scene_attention['list'] as $k => $v){
					$scene_attention['desc'] .= $v['desc'].'<br>'; 
				}
			}
		}

		if($ainfo['useful']!=''&& $ainfo['useful']!='""'){
			$scene_useful= json_decode($ainfo['useful'],true);
			$str_useful = '';
			if($scene_useful['list']){
				foreach($scene_useful['list'] as $key => $value){
					$str_useful .= $value['name'].':'.$value['desc'].'<br>';
				}	
			}
		}
		$scenicinfo = $this->api->request($this->apihost.'/area/'.$aid.'/scenics');
		$sinfo = $scenicinfo['data']['items'];
		$arrmap = array();
		$length = 0;
		if(count($sinfo)>0){
			$centtude = array(
				'long' => '0',
				'lati' => '0',
			);
			foreach($sinfo as $k => $v){
				//$sinfo[$k]['longitude'] = $this->_retude($v['latitude']);
				//$sinfo[$k]['latitude'] = $this->_retude($v['longitude']);
				$centtude['long'] += $sinfo[$k]['lgt'];
				$centtude['lati'] += $sinfo[$k]['lat'];
				$arrmap[] = array(
					'title' => $v['name'],
					'content' =>$v['abstract'],
					'point' =>$sinfo[$k]['lat'].'|'.$sinfo[$k]['lgt'],
					'image' =>$v['image'],
				);
				if($sinfo[$k]['lat']=="" || $sinfo[$k]['lgt']==""||$sinfo[$k]['lat']==0){
					$length++;
				}
			}
			$chear = count($sinfo)-$length;
			if($chear==0) $chear = 1;
			$centtude['long'] = $centtude['long']/$chear;
			$centtude['lati'] = $centtude['lati']/$chear;
		
		}
		else{
			$centtude = array(
				'long' => '39.921901',
				'lati' => '116.403023',
			);

		
		}
		foreach($sinfo as $k =>$v){
			$sinfo[$k]['hid'] = $k+1;

		}
		$data = array(
			'ainfo' =>$ainfo,
			'sinfo'  =>$sinfo,
			'cent'    => $centtude,
			'jsonmap'  =>json_encode($arrmap),
			'scene_pic' =>$scene_pic,
			'scene_traffic' =>$scene_traffic, 
			'scene_dining' =>$scene_dining, 
			'scene_line' =>$scene_line, 
			'scene_geo_his' =>$scene_geo_his, 
			'scene_around_scene' =>$scene_around_scene, 
			'scene_attention' =>$scene_attention,
			'scene_useful' =>$str_useful,
			'scene_goods' =>$scene_goods,
			'scene_shopping_desc' =>$scene_shopping_desc,
			'scene_business' =>$scene_business,
			);
		//echo "<pre>";var_dump($data);exit;
		$this->smarty->view('area.tpl',$data);
	}
	function showpoints(){
		strlen($_GET['sid'])  ? $sid = (int)$_GET['sid'] :NULL;
		$points = $this->api->request($this->apihost.'/scenic/'.$sid.'/points');
		$points = $points['data']['items'];
		$arrmap = array();
		if(count($points)){
			$centtude = array(
				'long' => '0',
				'lati' => '0',
			);
			foreach($points as $k =>$v){
				$points[$k]['hid'] = $k+1;
				$points[$k]['longitude'] = $this->_retude($v['latitude']);
				$points[$k]['latitude'] = $this->_retude($v['longitude']);
				$centtude['long'] += $points[$k]['longitude'];
				$centtude['lati'] += $points[$k]['latitude'];
				$arrmap[] = array(
					'title' => $v['name'],
					'content' =>$v['note'],
					'point' =>$points[$k]['latitude'].'|'.$points[$k]['longitude'],
					'image' =>$v['image'],
				);
			}
			$centtude['long'] = $centtude['long']/count($points);
			$centtude['lati'] = $centtude['lati']/count($points);
		
			
		}
		else{
			$centtude = array(
				'long' => '39.921901',
				'lati' => '116.403023',
			);
		
		}
		$data = array(
			'points' =>$points,
			'cent'    => $centtude,
			'jsonmap'  =>json_encode($arrmap),

		);
		//echo "<pre>";print_r($data);exit;
		$this->smarty->view('point.tpl',$data);

	}
       function search(){
		$prolist = $this->api->request($this->apihost.'/provinces');
		$prolist['httpcode']== 200 ?$prolist = $prolist['data']['items']:exit('api error1');
		$prolist = $this->_reid($prolist);

		if(isset($_GET['cid'])&&strlen($_GET['cid'])){
			$pid = $this->api->request($this->apihost.'/getpidbycid/'.(int)$_GET['cid']);
			$pid = $pid['data']['items']['0']['pid'];
			$cid = (int)$_GET['cid'];
		}
		elseif(isset($_GET['pid'])&&strlen($_GET['pid'])){

			$pid = (int)$_GET['pid'];


		}
		else{
			$pid = 2;
		
		}
		//cid 优先，有cid先取cid ，没有的话再取pid，再没有取默认pid =2 

		$citylist = $this->api->request($this->apihost.'/province/'.$pid.'/cities');
		$citylist['httpcode']== 200 ?$citylist = $citylist['data']['items']:exit('api error2');
		$citylist = $this->_reid($citylist);
		if($cid==''){
			if(isset($_GET['cid'])&&strlen($_GET['cid'])){
				$cid = (int)$_GET['cid'];
			}
			else{
			$cid = array_rand($citylist);
			}
		}
		// info of pro
		$pro_info = $prolist[$pid];

		//info if city
		$page =(isset($_GET['per_page']))?(int)$_GET['per_page'] : 0;
			if($page!=0){
				$page =$page - 1;
			}
		$pcid = isset($_GET['pid'])? $_GET['pid']: '2'; 
		$ccname = isset($_GET['ccname'])? $_GET['ccname']: ''; 
		if($ccname){
		$arealist = $this->api->request($this->apihost.'/search?name='.$ccname.'&page='.$page.'&pid='.$pcid);
		$config['base_url'] = 'http://travel.ymsun.in1001.com/search/index?cid='.$cid.'&pid='.$pcid.'&ccname='.$ccname;

		}else{
			exit('数据 ERROR');
		}
		$rows = $arealist['data']['rows'];
		$arealist['httpcode']== 200 ?$arealist = $arealist['data']['items']:exit('api error3');
		$arrmap = array();
		$this->load->library('pagination');
		$config['total_rows'] = $rows;
		$config['per_page'] = 10; 
		$config['num_links'] = 3;
		$config['uri_segment'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$this->pagination->initialize($config); 
		$road = array();
		$length = 0;
		if(count($arealist)){
			$centtude = array(
				'long' => '0',
				'lati' => '0',
			);
			foreach($arealist as $k =>$v){
				$arealist[$k]['hid'] = (int)($k+1);
				if($k >3){
					//unset($arealist[$k]);
				}
				//$arealist[$k]['longitude'] = $this->_retude($v['latitude']);
				//$arealist[$k]['latitude'] = $this->_retude($v['longitude']);
				$centtude['long'] += $arealist[$k]['lgt'];
				$centtude['lati'] += $arealist[$k]['lat'];
				$arrmap[] = array(
					'title' => $v['name'],
					'content' =>$v['abstract'],
					'point' =>$arealist[$k]['lat'].'|'.$arealist[$k]['lgt'],
					'image' =>$v['image'],
				);
				$road[$arealist[$k]['lat'].'|'.$arealist[$k]['lgt']]= $v['name'];  
				if($arealist[$k]['lat']=="" || $arealist[$k]['lgt']==""||$arealist[$k]['lat']==0){
					$length++;
				}
			}
			$chear = count($arealist)-$length;
			if($chear==0) $chear = 1;
			$centtude['long'] = $centtude['long']/$chear;
			$centtude['lati'] = $centtude['lati']/$chear;
			//print_r($centtude);
		}
		else{
			$centtude = array(
				'long' => '39.921901',
				'lati' => '116.403023',
			);

		}
		$roadsel = array(
			'start' => $this->api->html_select($road,'start','start'),
			'end' => $this->api->html_select($road,'end','end'),

		);
		$area = $this->api->request($this->apihost.'/getpidbycid/'.$pid);
		$area['httpcode']== 200 ?$area = $area['data']['items']:exit('api error');
		$area_useful =  array();
		$area_attention =  array();
		$area_business =  array();
		$area_goods =  array();
		$area_shopping_desc =  '';
		if($area[0]['traffic']!=""){
			$area_traffic = json_decode($area[0]['traffic'],true);
			$area_traffic = isset($area_traffic['local']); 
		}
		if($area[0]['dining']!=""){
			$area_dining= json_decode($area[0]['dining'],true);
			$area_dining= isset($area_dining['food']); 
		}
		$aaa = array();
		$area = $area[0];	
		if($area['geo_his']!=''&& $area['geo_his']!='""' &&$area['geo_his']!='null'){
			$area_geo_his= json_decode($area['geo_his'], true);
			$area_geo_his= $area_geo_his['list'];
		}
		if($area['shopping']!=''&& $area['shopping']!='""'){
			$area_shopping= json_decode($area['shopping'],true);
			if(isset($area_shopping['goods'])){
				$area_goods = $area_shopping['goods'];
			}
			if(isset($area_shopping['business'])){
				$area_business= $area_shopping['business'];
			}
			if(isset($area_shopping['desc'])){
				$area_shopping_desc= $area_shopping['desc'];
			}
		}
		$area_desc = '';
		if($area['attention']!=''&& $area['attention']!='""'){
			$area_attention = json_decode($area['attention'],true);
			if(!isset($area_attention['desc'])){
				foreach($area_attention['list'] as $k => $v){
					$area_desc .= $v['desc'].'<br>'; 
				}
			}
		}
		if($area['useful']!=''&& $area['useful']!='""'){
			$area_useful= json_decode($area['useful']);
			$area_useful= $this->_json_to_array($area_useful);
			$area_useful= $this->_json_to_array($area_useful['list']);
		}
		$data = array(
			'prolist' =>$prolist,
			'citylist' =>$citylist,
			'pro_info' =>$pro_info,
			'arealist' =>$arealist,
			'jsonmap'  =>json_encode($arrmap),
			'cent'    => $centtude,
			'road' =>$roadsel,
			'pid' =>$pid,
			'cid' =>$cid,
			'area' =>$area,
			'area_traffic' => $area_traffic, 
			'area_dining' => $area_dining, 
			'area_useful' => $area_useful, 
			'area_attention' => $area_attention, 
			'area_desc' => $area_desc,
			'area_goods' => $area_goods, 
			'area_shopping_desc' => $area_shopping_desc, 
			'area_business' => $area_business, 
			'area_geo_his' => $area_geo_his, 
			'page' =>  $this->pagination->create_links(),
		);

		//echo "<pre>"; print_r($arealist);exit;

		$this->smarty->view('areas.tpl',$data);

	}

	function get_traffic($traffic){
		$arr_re = '';
		$arr_lo = '';
		$str = '' ;
		foreach($traffic as $k => $v){
			if($k=='remote'){
				foreach($v as $key=>$value){
				if(isset($value['key'])=='type'){
					$arr_re .= $value['type'].':'.$value['desc'].'<br>';
				}else{
					$arr_re .= $value['name'].':'.$value['desc'].'<br>';
				}
				}
			}elseif($k=='local'){
				foreach($v as $key=>$value){
				if(isset($value['key'])=='type'){
					$arr_lo .= isset($value['type']).':'.$value['desc'].'<br>';
				}else{
					$arr_lo .= isset($value['name']).':'.$value['desc'].'<br>';
				}
				}
			}else{
				$str .='';
			}
		}
		if($arr_re){
			$str .= '<span style="margin-left:30px;">到达与离开:</span><br>'.$arr_re; 
		}
		if($arr_lo){
			$str .= '<span style="margin-left:30px;">当地交通:</span><br>'.$arr_lo; 
		}
		return $str;
	}
	function ajax(){
		$pid = isset($_POST['cid'])?$_POST['cid']:'2';
		$ccname = isset($_POST['find'])?$_POST['find']:'';
		$city = $this->api->request($this->apihost.'/getid?name='.$ccname);
		$city['httpcode']== 200 ?$city= $city['data']['items']:exit('api error');
		$cid = isset($city[0]['cid'])?$city[0]['cid']:36;
		$url = 'http://travel.ymsun.in1001.com/show/search?ccname='.$ccname.'&pid='.$pid.'&cid='.$cid;
		echo Header("Location:$url");
	}
	function images(){
		$imagecity = $this->api->request($this->apihost.'/city');
		$imagecity['httpcode']== 200 ?$imagecity= $imagecity['data']:exit('api error');
		$cid = isset($_GET['city'])?$_GET['city']:'北京';
		$keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
		$keyword = str_replace(' ','%20',$keyword);
		if($cid && $keyword){
			$imagelist = $this->api->request($this->apihost.'/images?city='.$cid.'&keyword='.$keyword);
		}else{
			$imagelist = $this->api->request($this->apihost.'/images?city='.$cid);
		}
		$imagelist['httpcode']== 200 ?$imagelist = $imagelist['data']:exit('api error');
		$keywordlist =  $this->api->request($this->apihost.'/images/keyword?city='.$cid);
		$keywordlist['httpcode']== 200 ?$keywordlist= $keywordlist['data']:exit('api error');
		$imagecity = $this->api->request($this->apihost.'/city');
		$imagecity['httpcode']== 200 ?$imagecity= $imagecity['data']:exit('api error');

		$data = array(
			'keyword' => $keyword,
			'city' => $cid,
			'imagecity' =>$imagecity,
			'keywordlist' =>$keywordlist,
			'imagelist' =>$imagelist,
			);
		//echo "<pre>";var_dump($data);exit;
		$this->smarty->view('images.tpl',$data);
	}
	function hotel($cid='',$page=0){

		//echo $this->config->item('api_host');
		$prolist = $this->api->request($this->apihost.'/provinces');
		$prolist['httpcode']== 200 ?$prolist = $prolist['data']['items']:exit('api error1');
		$prolist = $this->_reid($prolist);

		if(isset($_GET['cid'])&&strlen($_GET['cid'])){
			$pid = $this->api->request($this->apihost.'/getpidbycid/'.(int)$_GET['cid']);
			$pid = $pid['data']['items']['0']['pid'];
			$cid = (int)$_GET['cid'];
		}
		elseif(isset($_GET['pid'])&&strlen($_GET['pid'])){

			$pid = (int)$_GET['pid'];


		}
		else{
			$pid = 2;
		
		}
		//cid 优先，有cid先取cid ，没有的话再取pid，再没有取默认pid =2 

		$citylist = $this->api->request($this->apihost.'/province/'.$pid.'/cities');
		$citylist['httpcode']== 200 ?$citylist = $citylist['data']['items']:exit('api error2');
		$citylist = $this->_reid($citylist);
		if($cid==''){
			if(isset($_GET['cid'])&&strlen($_GET['cid'])){
				$cid = (int)$_GET['cid'];
			}
			else{
			$cid = array_rand($citylist);
			}
		}
		// info of pro
		$pro_info = $prolist[$pid];

		//info if city
		if($page==''){
			$page =(isset($_GET['per_page']))?(int)$_GET['per_page'] : 0;
			if($page!=0){
				$page =$page - 1;
			}
		}
		$cid = isset($_GET['cid'])? $_GET['cid']: '36'; 

		$hotellist = $this->api->request($this->apihost.'/hotel/'.$cid.'/page/'.$page);
		$config['base_url'] = 'http://travel.ymsun.in1001.com/show/hotel?cid='.$cid;
		$rows = $hotellist['data']['rows'];
		$hotellist['httpcode']== 200 ?$hotellist = $hotellist['data']['items']:exit('api error3');
		$arrmap = array();
		$this->load->library('pagination');
		$config['total_rows'] = $rows;
		$config['per_page'] = 10; 
		$config['num_links'] = 3;
		$config['uri_segment'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$this->pagination->initialize($config); 
		$data = array(
			'prolist' =>$prolist,
			'citylist' =>$citylist,
			'hotel' =>$hotellist,
			'page' =>  $this->pagination->create_links(),
			);
		//echo "<pre>";var_dump($data);exit;
		$this->smarty->view('hotel.tpl',$data);
	}
	function restaurants($cid='',$page=0){
		require_once('b.php');
		//echo $this->config->item('api_host');
		$prolist = $this->api->request($this->apihost.'/provinces');
		$prolist['httpcode']== 200 ?$prolist = $prolist['data']['items']:exit('api error1');
		$prolist = $this->_reid($prolist);

		if(isset($_GET['cid'])&&strlen($_GET['cid'])){
			$pid = $this->api->request($this->apihost.'/getpidbycid/'.(int)$_GET['cid']);
			$pid = $pid['data']['items']['0']['pid'];
			$cid = (int)$_GET['cid'];
		}
		elseif(isset($_GET['pid'])&&strlen($_GET['pid'])){

			$pid = (int)$_GET['pid'];


		}
		else{
			$pid = 2;
		
		}
		//cid 优先，有cid先取cid ，没有的话再取pid，再没有取默认pid =2 

		$citylist = $this->api->request($this->apihost.'/province/'.$pid.'/cities');

		if(isset($_GET['cid'])){
		$cityerlist = $this->api->request($this->apihost.'/province/'.$cid.'/cities');
		$cityerlist['httpcode']== 200;
		$cityerlist = $cityerlist['data']['items'];
		$cityerlist = $this->_reid($cityerlist);
		}else{
		$cityerlist ='';
		}
		$citylist['httpcode']== 200 ?$citylist = $citylist['data']['items']:exit('api error2');
		$citylist = $this->_reid($citylist);
		
		if($cid==''){
			if(isset($_GET['cid'])&&strlen($_GET['cid'])){
				$cid = (int)$_GET['cid'];
			}
			else{
			$cid = array_rand($citylist);
			}
		}
		// info of pro

		//info if city
		if($page==''){
			$page =(isset($_GET['per_page']))?(int)$_GET['per_page'] : 0;
			if($page!=0){
				$page =$page - 1;
			}
		}
		$cid = isset($_GET['cid'])? $_GET['cid']: '36'; 
		$keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
		$foodtype = isset($_GET['foodtype'])?$_GET['foodtype']:'';
		if($foodtype=='特色餐饮' ||$foodtype=='cuisines' ){
			$foodtype='cuisines';
		}else{
			$foodtype='address';
		}
		if($cid && $keyword && $foodtype){
			$rest = $this->api->request($this->apihost.'/restaurants/'.$cid.'/page/'.$page.'?foodtype='.$foodtype.'&keyword='.$keyword);
		$config['base_url'] = 'http://travel.ymsun.in1001.com/show/restaurants?cid='.$cid.'&foodtype='.$foodtype.'&keyword='.$keyword;
		}else{
		$rest = $this->api->request($this->apihost.'/restaurants/'.$cid.'/page/'.$page);
		$config['base_url'] = 'http://travel.ymsun.in1001.com/show/restaurants?cid='.$cid;
		}
		$rows = $rest['data']['rows'];
		$rest['httpcode']== 200 ?$rest = $rest['data']['items']:exit('api error3');
		$arrmap = array();
		$this->load->library('pagination');
		$config['total_rows'] = $rows;
		$config['per_page'] = 12; 
		$config['num_links'] = 3;
		$config['uri_segment'] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$this->pagination->initialize($config); 
		if(isset($_GET['cid'])){
		$cityname = $this->replace_cityname($citylist[$cid]['name']);
		}else{
		$cityname = '';
		}
		$data = array(
			'cid' => $cid,
			'prolist' =>$prolist,
			'citylist' =>$citylist,
			'cityerlist' =>$cityerlist,
			'cityname' =>$cityname,
			'rest' =>$rest,
			'page' =>  $this->pagination->create_links(),
			'handle' => $handle, 
			'keyword' => $keyword, 
			
			);
		//echo "<pre>";var_dump($data);exit;
		$this->smarty->view('restaurants.tpl',$data);
	}
	function restimages(){
		$id = isset($_GET['id'])? $_GET['id']: ''; 
		if(!$id){
		 exit('error');
		}
		$rest = $this->api->request($this->apihost.'/restimages/'.$id);
		$rest['httpcode']== 200 ?$rest = $rest['data']['items']:exit('api error2');
		$rest = $this->_reid($rest);
		foreach($rest as $key => $value){
			$rest[$key]['photos'] = json_decode($value['photos'],true);
		}
		$data = array(
			'rest' =>$rest,
			);
		//echo "<pre>";var_dump($data);exit;
		$this->smarty->view('restimages.tpl',$data);
	}
	function hotelimages(){
		$id = isset($_GET['id'])? $_GET['id']: ''; 
		if(!$id){
		 exit('error');
		}
		$rest = $this->api->request($this->apihost.'/hotelimages/'.$id);
		$rest['httpcode']== 200 ?$rest = $rest['data']['items']:exit('api error2');
		$rest = $this->_reid($rest);
		foreach($rest as $key => $value){
			$rest[$key]['photos'] = json_decode($value['photos'],true);
		}
		$data = array(
			'hotelimage' =>$rest,
			);
		//echo "<pre>";var_dump($data);exit;
		$this->smarty->view('hotelimages.tpl',$data);
	}
	function replace_cityname($name){
		return preg_replace('/(市|地区|特别行政区|白族自治州)$/', '', trim($name));
	}
}
?>


