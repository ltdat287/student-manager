<?php
class tenhs{
	var $id = '';
	var $age = '';
	var $city = '';
	var $full_name = '';
	
	public function name_of_father($id){
		//danh lenh
	}
	
	public function set_value($id,$age,$city,$full_name){
		$this->$id = $id;
		$this->$age = $age;
		$this->$city = $city;
		$this->$full_name = $full_name;
	}
}
?>