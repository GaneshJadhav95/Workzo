<?php
	require_once"../authorization/config.php";
	require_once"users-data.php";
	$json_input = file_get_contents('php://input');
	$data = json_decode($json_input, true);
	
	if(isset($data['input'])){
		$input = validation($data['input']);
		$input = esc($conn, $input);
		$sql = new Users($conn);
		$data = $sql->search_freelancer($input);
		echo json_encode([
			'data'=> $data
		]);
	}
	
	if(isset($data['input2'])){
		$input = validation($data['input2']);
		$input = esc($conn, $input);
		$sql = new Users($conn);
		$data = $sql->search_client($input);
		echo json_encode([
			'data'=> $data
		]);
	}
?>