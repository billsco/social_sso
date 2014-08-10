<?php
	#AUTOGENERATED BY HYBRIDAUTH 2.1.2 INSTALLER - Thursday 7th of August 2014 02:19:46 PM

/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return 
	array(
		"base_url" => "http://billsco.com/test/sso/hybridauth/", 

		"providers" => array ( 
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"AOL"  => array ( 
				"enabled" => true 
			),

			"Yahoo" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "526825345542-iu8ppl4aepscvh16dh25c2bjfo25il1q.apps.googleusercontent.com", "secret" => "kSgOjcPduwXhMb_apoZNc3DM" )
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "768005766575651", "secret" => "394cb9cb68b755aeb3278fa6478c5af2" )
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "Ax3OWAAmuNi0VTkIfLaWhnmeF", "secret" => "tgvXFaFZQwDS19mWwhrxMsUn85J9Q03JUpvfHXUEuV1X0yRZM2" ) 
			),

			// windows live
			"Live" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ) 
			),

			"MySpace" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" ) 
			),

			"LinkedIn" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" ) 
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ) 
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => true,

		"debug_file" => "/home1/billscoc/public_html/test/sso/hybridauth/ha_debug.log"
	);