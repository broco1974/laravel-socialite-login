<?php

return [
	'userclass' => 'App\\User',
    'socialuserclass' => 'Broco\\SocialiteLogin\\Auth\\UserSocialite',
	'intended-redirect' => [
		'success' => '/#socialite:success',
		'failure' => '/#socialite:failure',
	],
    'allowed-providers' => ['twitter', 'facebook', 'linkedin', 'google', 'github', 'bitbucket'],
	'limit-access' => [
		// 'email' => '/@example\.com$/i',
	],
];
