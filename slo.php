<?php

	error_reporting(E_ALL);

	session_start();
	
	$config =  __DIR__ . "/hybridauth/config.php";
	require_once( __DIR__ . "/hybridauth/Hybrid/Auth.php");
	$ha = new Hybrid_Auth($config);	

	function slo_logout() {
		global $ha;
		$ha -> logoutAllProviders();
	}

?>