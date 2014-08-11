<?php

	error_reporting(E_ALL);

	session_start();
	
	$config = __DIR__ . "/hybridauth/config.php";
	require_once( __DIR__ . "/hybridauth/Hybrid/Auth.php");
	
	$origApp = $_GET["orig_app"];
	
	if(!$origApp) {
		error_log("(sso/index.php) no origApp sent in query params");
		//TODO Something better
		echo "<html><body>You cannot directly access this</body></html>";
		die();
	}
	
	$errorMessage = "";//Need to learn PHP better
	
	$providerName = $_GET["provNetwork"];
	
	$haOpts = array("hauth_return_to" => urldecode($origApp));
	
	$ha = new Hybrid_Auth($config);
	
	$connectedProviders = $ha->getConnectedProviders();

	if((sizeof($connectedProviders) == 0)) {

		if($providerName) {
			try {
				$foo = $ha->authenticate( $providerName, $haOpts);
				//We should not get here.  It either redirects back to provider or original page
			}
			catch( Exception $e) {
				//TODO handle errors
				error_log("Caught Exception: " . $e);
				$errorMessage = "Bill needs to fix this";
			}
		}
	}
	else {
		//Shouldn't need this as HA does this for us.
		header("Location: " . urldecode($origApp));	
		die();			

	}	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Billsco Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">



  <div class="row">
    <div class="page-header">
        <h1 class="text-center">Please sign in</h1>
        
<?php
	if(!empty($errorMessage)) {        
?>
<p class="text-danger text-center"><?=$errorMessage?></p>
<?php
	}
?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
      <a class="btn btn-block btn-lg btn-social btn-google-plus" href="./?orig_app=<?=$origApp?>&provNetwork=Google" rel="nofollow">
        <i class="fa fa-google-plus"></i>
        Sign in with Google
      </a>
      <a class="btn btn-block btn-lg btn-social btn-facebook" href="./?orig_app=<?=$origApp?>&provNetwork=Facebook" rel="nofollow">
        <i class="fa fa-facebook"></i>
        Sign in with Facebook
      </a>
      <a class="btn btn-block btn-lg btn-social btn-twitter" href="./?orig_app=<?=$origApp?>&provNetwork=Twitter" rel="nofollow">
        <i class="fa fa-twitter"></i>
        Sign in with Twitter
      </a>
    </div>
  </div>

</div>

</body>
</html>