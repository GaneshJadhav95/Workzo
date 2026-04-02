<?php
    function validation($data){
		$data = trim($data);          
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
	}

	function validation_email($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = filter_var($data, FILTER_SANITIZE_EMAIL);
		return $data;
	}

	function validation_number($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
		return $data;
	}

	function esc($conn, $data){
		$data = mysqli_real_escape_string($conn, $data);
		return $data;
	}
?>