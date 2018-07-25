<?php

require_once("../config/helper.php");
require_once("../models/books.php");

if(helper::isGet()){
	//helper::cors();
	//header('Origin: http://localhost:80');
	//header('Host: localhost')
	
	//header("HTTP/1.1 200 OK");
	//header('Access-Control-Expose-Headers: Access-Control-Allow-Origin');
	//header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
	//header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	//header('Accept: */*');
	//header('Content-Type: x-www-form-urlencoded');
	//header('Access-Control-Allow-Headers: access-control-allow-origin');
	//header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Accept');
	//header('Access-Control-Allow-Credentials: true');
	//header('Access-Control-Max-Age: 1000');
	
	//header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	//translate array kedalam json
	//apakah ada variabel id? jika ada cetak 1 buku berdasarkan id, jika tidak ada cetak seluruh buku.
	if(isset($_GET['id'])){
		echo json_encode(books::getBook($_GET['id']));
	}else{
		//print_r(books::getAllBooks());
		echo json_encode(books::getAllBooks());
	}
}
if(helper::isPost()){
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
	header('Access-Control-Allow-Credentials: true');
	header('Accept: application/json');
	//header('Content-Type: text/html; charset=UTF-8');
	header('Content-Type: application/json; charset=UTF-8');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Accept, application/json');
	//ambil json dari body
	$inputJSON = file_get_contents('php://input');
	//translate json kedalam array
	//echo $inputJSON;
	$input = json_decode($inputJSON, TRUE);
	//print_r($input);
	
	//panggil fungsion insert dengan parameter array yang tadi udah di translate
	//books::insertBooks($input);
	$input['date'] = (new \DateTime())->format('Y-m-d H:i:s');
	
	//balikin respons json jika hasilnya true return objek yang barusan dimasukkin
	if(books::insertBooks($input)){
		return $input;
	}else{
		header("HTTP/1.1 400 OK");
		echo json_encode(array('error_message'=>'gagal menambahkan row dalam buku'));
	}
	//kalo gagal, return respons error tidak dapat memasukkan data
	
}

if(helper::isPut()){
	header('Access-Control-Allow-Origin: http://localhost:3000');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
	//ambil json dari body
	$inputJSON = file_get_contents('php://input');
	//translate json kedalam array
	$input = json_decode($inputJSON, TRUE);
	
	//panggil fungsion insert dengan parameter array yang tadi udah di translate
	//books::insertBooks($input);
	$input['date'] = (new \DateTime())->format('Y-m-d H:i:s');
	
	//balikin respons json jika hasilnya true return objek yang barusan dimasukkin
	if(books::updateBook($_GET['id'], $input)){
		return $input;
	}else{
		header("HTTP/1.1 400 OK");
		echo json_encode(array('error_message'=>'gagal menambahkan row dalam buku'));
	}
}
?>