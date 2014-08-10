<?php


	error_reporting(E_ALL);

	session_start();
	
	error_log("(sso/ssoInc.php) Session " . $_SESSION["count"]);	
	
	$config =  __DIR__ . "/hybridauth/config.php";//dirname(__FILE__) . "../../ha/hybridauth/config.php";
	require_once( __DIR__ . "/hybridauth/Hybrid/Auth.php");
	
	$ha = new Hybrid_Auth($config);

// Line below works.	
//	error_log("TESTING: " . Hybrid_Auth::$config["base_url"]);

	$connectedProviders = $ha->getConnectedProviders();

	if(sizeof($connectedProviders) == 0) {
		error_log("(sso/ssoInd.php) connected providers == 0");
		
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
		error_log("baseUrlPath befor eexplode: " .$baseUrlPath);
		$baseUrlComponents = explode("/", $baseUrlPath);
		$redirectUri = "/";
		for($i=0;$i<(count($baseUrlComponents)-1);$i++) {
			error_log("URL component: " . $baseUrlComponents[$i]);
			$redirectUri = $redirectUri . $baseUrlComponents[$i] . "/";
		}
		$redirectUri = $redirectUri . "index.php";
		
		error_log("REDIRECT URI: " . $redirectUri);
		
		error_log("baseUrlPath: " . $baseUrlPath);
		

		$qp = array("orig_app" => $_SERVER["REQUEST_URI"]);//, "provNetwork" => "Twitter");//second param is a temp hack
		$qpEncoded = http_build_query($qp);
		error_log("(some app) Connected providers 0.  qpEncoded : " . $qpEncoded);		
		header("Location: " . $redirectUri . "?" . $qpEncoded);
		die();	
		
	}
	else {
		echo "I guess you are logged in";
	}

?>