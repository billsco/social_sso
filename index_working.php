<?php

	error_reporting(E_ALL);

	session_start();
	
	$config = "../../ha/hybridauth/config.php";
	require_once("../../ha/hybridauth/Hybrid/Auth.php");
	
	error_log("GREPFORME ====================");
	error_log("Session " . $_SESSION["count"]);
	$_SESSION["count"] = $_SESSION["count"]+1;
	
	$origApp = $_GET["orig_app"];
	
	if(!$origApp) {
		//TODO Something better
		echo "<html><body>You cannot directly access this</body></html>";
		die();
	}
	
	$providerName = $_GET["provNetwork"];
	
	
	$haOpts = array("hauth_return_to" => urldecode($origApp));
	
	$ha = new Hybrid_Auth($config);

	
	$connectedProviders = $ha->getConnectedProviders();

	if(sizeof($connectedProviders) == 0) {
	
		error_log("GREPFORME: connectedProviders 0");
		$twitter = $ha->authenticate( $providerName, $haOpts);
		
		if($twitter) {
			//Clean this up.  Not used anymore once I figured
			//out how to use the options to authenticate
			error_log("GREPFORME: got past twitter.  Manual redirect");
			header("Location: " . urldecode($origApp));	
			die();				
		}	
	
	}
	else {
		error_log("GREPFORME: connectedProviders > 0, manual redirect");
		header("Location: " . urldecode($origApp));	
		die();			

	}	
	

?>