<?php

require_once("../config/database.php");


class books{
	
	public static function getAllBooks(){
		$conn = database::connection();
		$sql = "SELECT * FROM products";
		$result = $conn->query($sql);
		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		return $row;
	}
	
	public static function insertBooks($param){
		$conn = database::connection();
		$sql = "INSERT INTO products (name, description, price, date, category, image) VALUES ('".$param['name']."',
		'".$param['description']."','".$param['price']
		."','".$param['date']."','".$param['category']."','".$param['image']."')";
		
		return $conn->query($sql) === TRUE;

	}
	public static function updateBook($id, $param){
		$conn = database::connection();
		$sql = "UPDATE products SET
		name='".$param['name']."',"
		."description='".$param['description']."',"
		."price='".$param['price']."',"
		."date='".$param['date']."',"
		."category='".$param['category']."',"
		."image='".$param['image']."'"
		." WHERE id=".$id;
		
		return $conn->query($sql) === TRUE;

	}
	public static function getBook($id){
		$conn = database::connection();
		$sql = "SELECT * FROM products WHERE id = ".$id;
		$result = $conn->query($sql);
		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		return $row;
	}

}

?>