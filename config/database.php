<?php

class database{
	
	public static function connection(){
		$link = mysqli_connect("localhost", "root", "", "ecommerce");
	
	if(!$link){
		return false;
	}else{
		return $link;
	}
	}

}
?>