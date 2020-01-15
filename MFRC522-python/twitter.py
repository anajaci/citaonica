from twython import Twython

from auth import (
    	app_key,
	app_secret,
	oauth_token,
	oauth_token_secret
	
)

twitter = Twython(
    	app_key,
	app_secret,
	oauth_token,
	oauth_token_secret
)


