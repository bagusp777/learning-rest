<?php

class helper{
	
	public static function cors(){
		
		if(isset($_SERVER['HTTP_ORIGIN'])){
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Max-Age: 86400');
		}
		
		if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
			if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) 
				header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
			
			if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
				header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			
			exit(0);
		}
		
		//echo "You have CORS!!";
	}
	
	public static function isGet(){
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}
		
	public static function isPost(){
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}
	
	public static function isPut(){
		return $_SERVER['REQUEST_METHOD'] === 'PUT';
	}
	
	public static function isDelete(){
		return $_SERVER['REQUEST_METHOD'] === 'DELETE';
		
	}
	
	
}

?>