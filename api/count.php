<?php
	require_once"../authorization/config.php";
	require_once"users-data.php";
	
	$sql = new Users($conn);
	$data = $sql->freelancer_count();
	$data2 = $sql->client_count();
	$active = $sql->active();
	$url = $sql->url();
	$total = $data['count'] + $data2['count'];
	echo json_encode([
		'total'=> $total,
		'active'=> $active['count'],
		'url'=> $url
	]);
?>