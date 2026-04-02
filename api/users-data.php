<?php
	class Users{
		private $conn;
		
		public function __construct($conn){
			$this->conn = $conn;
		}
		
		public function get_freelancer(){
			//$sql = mysqli_query($this->conn, "SELECT * FROM `freelancer`");
			$sql = $this->conn->prepare("SELECT * FROM `freelancer`");
			$sql->execute();
			$result = $sql->get_result();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		
		public function get_client(){
			//$sql = mysqli_query($this->conn, "SELECT * FROM `client`");
			$sql = $this->conn->prepare("SELECT * FROM `client`");
			$sql->execute();
			$result = $sql->get_result();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
				
		public function search_freelancer($input){
			//$sql = mysqli_query($this->conn, "SELECT * FROM `freelancer` WHERE `name` LIKE '%$input%'");
			$sql = $this->conn->prepare("SELECT * FROM `freelancer` WHERE `name` LIKE '%$input%'");
			$sql->execute();
			$result = $sql->get_result();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		
		
		public function search_client($input){
			//$sql = mysqli_query($this->conn, "SELECT * FROM `client` WHERE `name` LIKE '%$input%'");
			$sql = $this->conn->prepare("SELECT * FROM `client` WHERE `name` LIKE '%$input%'");
			$sql->execute();
			$result = $sql->get_result();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		
		public function freelancer_count(){
			//$sql = mysqli_query($this->conn, "SELECT COUNT(*) AS count FROM `freelancer`");
			$sql = $this->conn->prepare("SELECT COUNT(*) AS count FROM `freelancer`");
			$sql->execute();
			$result = $sql->get_result();
			return $result->fetch_assoc();		
		}
		
		public function client_count(){
			//$sql = mysqli_query($this->conn, "SELECT COUNT(*) AS count FROM `client`");
			$sql = $this->conn->prepare("SELECT COUNT(*) AS count FROM `client`");
			$sql->execute();
			$result = $sql->get_result();
			return $result->fetch_assoc();	
		}
		
		public function active(){
			//$sql = mysqli_query($this->conn, "SELECT COUNT(DISTINCT `users`) AS count, `url` FROM `active_users`");
			$sql = $this->conn->prepare("SELECT COUNT(DISTINCT `users`) AS count, `url` FROM `active_users`");
			$sql->execute();
			$result = $sql->get_result();
			return $result->fetch_assoc();
		}
		
		public function url(){
			//$sql = mysqli_query($this->conn, "SELECT DISTINCT url FROM `active_users`");
			$sql = $this->conn->prepare("SELECT DISTINCT url FROM `active_users`");
			$sql->execute();
			$result = $sql->get_result();
			return $result->fetch_all(MYSQLI_ASSOC);
		}
	}
?>