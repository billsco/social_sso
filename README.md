# Social SSO

A small project wrapping [Hybridauth] (http://hybridauth.sourceforge.net/) with a login page using [Social Buttons] (https://github.com/lipis/bootstrap-social).  In other words, two great projects I'm simply gluing together with a few lines of PHP.

This isn't intended as true **authentication**.  It may be suitable for that, but I haven't really dug for holes (there may be some).  My intent was to simple provide a mechanism to **identify** users of a multi-player game, in a manner which is unique and convienent.  

##Installation

1. Clone this repositiory somewhere onto your web root.
2. Configure Hybridauth
  * Contained within this repository is an install of hybridauth.  The `hybridauth` directory in this repository is the same as that which comes with the "normal" Hybridauth.  Follow [their instructions](http://hybridauth.sourceforge.net/userguide/Install.html).  Note that for your benifit, I renamed the `install.php` file to `install.php_HIDE`.  You can move it back when configuring your hybridauth.

##Consuming in your application

1. Note the relative location of the app you want to consume this to this distribution.  As an example, I'll assume the web root has directories `social_sso` (this distribution) and `myApp`.
2. Create `index.php` within `myApp`.  The contents of `index.php` may be something like:

```php
<?php

	require_once("../sso/ssoInc.php");
	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Example</title>
</head>
<body>
	<!-- For convienence, the Hybridauth user profile 
	(http://hybridauth.sourceforge.net/userguide/Profile_Data_User_Profile.html)
	object is already in scope
	-->
	<p>Display Name: <?=$user_profile->displayName?></p>
	<p>First Name: <?=$user_profile->firstName?></p>
	<p>Last Name: <?=$user_profile->lastName?></p>
	<p>Email: <?=$user_profile->email?></p>
					
</body>
</html>
```
The code looks odd because of hybridauth's use of redirects and php's `die()`.  So control will not flow past inclusion of `ssoInc.php` until successful authentication has taken place.

## Other

Don't forget to change the base URL in "config.php"

TODO Credit the dude who came up with the social icons/css (https://github.com/lipis/bootstrap-social)

TODO loop through the config and see which are enabled, and display buttons for those

TODO test more error cases

Note that the "hybridauth" distributiuon is standard, but that its relative path to this project must not change

Come up with a better way to handle "config".  I don't want to check-in mine from now on (currently, it is for a few throw-away projects).
