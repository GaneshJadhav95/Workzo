<?php
	require_once"../authorization/config.php";
	require_once"users-data.php";
	
	$sql = new Users($conn);
	$data = $sql->get_freelancer();
	$data2 = $sql->get_client();
		
	echo json_encode([
		'data'=> $data,
		'data2'=> $data2
	]);
?>