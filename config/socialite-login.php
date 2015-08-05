<?php

return [
	'userclass' => 'App\\User',
    'socialuserclass' => 'Broco\\SocialiteLogin\\Auth\\UserSocialite',
	'intended-redirect' => [
		'success' => '/#socialite:success',
		'failure' => '/#socialite:failure',
	],
	'limit-access' => [
		// 'email' => '/@example\.com$/i',
	],
];
