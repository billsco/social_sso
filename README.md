# Social SSO

A small project wrapping [Hybridauth] (http://hybridauth.sourceforge.net/) with a login page using [Social Buttons] (https://github.com/lipis/bootstrap-social).  In other words, two great projects I'm simply gluing together with a few lines of PHP.

Don't forget to change the base URL in "config.php"

TODO Credit the dude who came up with the social icons/css (https://github.com/lipis/bootstrap-social)

TODO loop through the config and see which are enabled, and display buttons for those

TODO test more error cases

Note that the "hybridauth" distributiuon is standard, but that its relative path to this project must not change

Come up with a better way to handle "config".  I don't want to check-in mine from now on (currently, it is for a few throw-away projects).
