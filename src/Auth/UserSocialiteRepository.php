<?php namespace Broco\SocialiteLogin\Auth;

class UserSocialiteRepository {

	public function findOrCreateUser($provider, $userData)
	{
		$provider_id = $userData->id;
        $userSocial = config('socialite-login.socialuserclass');
		$usersocial = $userSocial::firstOrNew(compact('provider','provider_id'));
		$usersocial->initializeOrUpdateIfNecessary($userData);
		return $usersocial->user;
	}

}
