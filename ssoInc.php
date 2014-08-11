<?php


	error_reporting(E_ALL);

	session_start();
	
	$config =  __DIR__ . "/hybridauth/config.php";
	require_once( __DIR__ . "/hybridauth/Hybrid/Auth.php");
	
	$ha = new Hybrid_Auth($config);

	$connectedProviders = $ha->getConnectedProviders();

	if(sizeof($connectedProviders) == 0) {
		
		//For now, I'm trying to devise the redirect URL based on 
		//the "base_url" in the config file of HybridAuth.  If this doesn't
		//work in some environments, just pass it in from the file which
		//included this file
		$baseUrlPath=parse_url(Hybrid_Auth::$config["base_url"], PHP_URL_PATH);
		if($baseUrlPath[0] == "/") {
			$baseUrlPath = substr($baseUrlPath, 1);
		}
		if($baseUrlPath[(strlen($baseUrlPath) - 1)]) {
			$baseUrlPath = substr($baseUrlPath, 0, (strlen($baseUrlPath)-1));
		}

		$baseUrlComponents = explode("/", $baseUrlPath);
		$redirectUri = "/";
		for($i=0;$i<(count($baseUrlComponents)-1);$i++) {
			error_log("URL component: " . $baseUrlComponents[$i]);
			$redirectUri = $redirectUri . $baseUrlComponents[$i] . "/";
		}
		$redirectUri = $redirectUri . "index.php";
		

		$qp = array("orig_app" => $_SERVER["REQUEST_URI"]);
		$qpEncoded = http_build_query($qp);
		header("Location: " . $redirectUri . "?" . $qpEncoded);
		die();	
		
	}
	$foo = $ha->authenticate( $connectedProviders[0]);
	$user_profile = $foo->getUserProfile();


?>