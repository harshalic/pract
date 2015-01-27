<?php


class cURL{

	public function cURL_GET($path){
			$baseUrl = "http://localhost:8000/employeeProject";
		$requestUrl = $baseUrl.$path;
		
		if(is_callable('curl_init')){
		echo 'calling-> '. $requestUrl; 
    	$ch = curl_init($requestUrl);
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	
		$res = curl_exec($ch);
		curl_close($ch);
		return $res;
		}else {
			echo 'cURL not enabled';
		}
	}

	
	public function cURL_POST($path,$sendData){
		
		$baseUrl = "http://localhost:8000/employeeProject";
		$requestUrl = $baseUrl.$path;
		$fields_string='';
		
		if(is_callable('curl_init')){
		echo 'calling-> '. $requestUrl; 
    	$ch = curl_init($requestUrl);
		
		//url-ify the data for the POST
		foreach($sendData as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_POST, count($_POST));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    	
    	
		$res = curl_exec($ch);
		curl_close($ch);
		return $res;
		}else {
			echo 'cURL not enabled';
		}
	}
	
	
}




?>