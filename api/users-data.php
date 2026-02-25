<?php
	class Users{
		private $conn;
		
		public function __construct($conn){
			$this->conn = $conn;
		}
		
		public function get_freelancer(){
			$sql = mysqli_query($this->conn, "SELECT * FROM `freelancer`");
			return mysqli_fetch_all($sql, MYSQLI_ASSOC);
		}
		
		public function get_client(){
			$sql = mysqli_query($this->conn, "SELECT * FROM `client`");
			return mysqli_fetch_all($sql, MYSQLI_ASSOC);
		}
				
		public function search_freelancer($input){
			$sql = mysqli_query($this->conn, "SELECT * FROM `freelancer` WHERE `name` LIKE '%$input%'");
			return mysqli_fetch_all($sql, MYSQLI_ASSOC);
		}
		
		public function search_client($input){
			$sql = mysqli_query($this->conn, "SELECT * FROM `client` WHERE `name` LIKE '%$input%'");
			return mysqli_fetch_all($sql, MYSQLI_ASSOC);
		}
	}
?>