<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/Database.php");

class Shout{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}
	
	public function getAllData(){
		$query = "SELECT * FROM tbl_box ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function insertData($data){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		date_default_timezone_set('Asia/Dhaka');
		$time = date('h:i:sa', time());
		
		$query = "INSERT INTO tbl_box(name, body, time) VALUES('$name','$body','$time')";
		$result = $this->db->insert($query);
		header("Location:index.php");
	}
}
?>
























