<?php
	function api($url){	//通过URL获取API里的数据{{{
		@$api_data = json_decode(file_get_contents($url), true);
		return $api_data;
	}	//}}}

	function opt($url_with_get, $post){	//{{{
		$user_agent = "op";
		$content_type = "application/x-www-form-urlencoded";
		$content = http_build_query($post);
		$content_length = strlen($content);
		$context = array(
						'http' => array(
										'method' => 'POST',
										'user_agent' => $user_agent,
										'header' => 'Content-Type: ' . $content_type . "\r\n" .
										'Content-Length: ' . $content_length,
										'content' => $content,
										),
						);
		$context_id = stream_context_create($context);
		echo file_get_contents($url_with_get, false, $context_id);
	}	//}}}


	function request($url,$params=array(),$requestMethod='GET',$jsonDecode=true,$headers=array(),$timeout = 10) {
		$ci = curl_init();
		curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ci, CURLOPT_USERAGENT, '1001 Magazine v1');
		curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ci, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ci, CURLOPT_ENCODING, "");
		curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ci, CURLOPT_HEADER, FALSE);

		$requestMethod = strtoupper($requestMethod);
		switch ($requestMethod) {
		case 'POST':
			curl_setopt($ci, CURLOPT_POST, TRUE);
			if ($params) {
				curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
			}
			else {
				curl_setopt($ci, CURLOPT_POSTFIELDS, ''); // Don't know why: if not set,  413 Request Entity Too Large
			}
			break;
		case 'DELETE':
			curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
			if ($params) {
				$url = "{$url}?{$params}";
			}
			break;
		case 'GET':
			if($params) {
				$sep = false === strpos($url,'?') ? '?' : '&';
				$url .= $sep . http_build_query($params);
			}
			break;
		case 'PUT':
			if($params) {
				curl_setopt($ci, CURLOPT_CUSTOMREQUEST, "PUT");                                                                     
				curl_setopt($ci, CURLOPT_POSTFIELDS, $params);                                                                  
			}
			break;
		}
		//$headers[] = "APIWWW: " . $_SERVER['REMOTE_ADDR'];
		curl_setopt($ci, CURLOPT_URL, $url );
		curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
		curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );

		$response = curl_exec($ci);
		$httpCode = curl_getinfo($ci, CURLINFO_HTTP_CODE);
		$return = array(
			'httpcode' => $httpCode,
			'data' => $httpCode >= 300 ? $response : ($jsonDecode ? json_decode($response,true) : $response),
		);
		//$httpInfo = curl_getinfo($ci);
		curl_close ($ci);
		return $return;
	}
