<?php namespace Broco\SocialiteLogin\Auth;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

trait AuthenticatesSocialiteLogin {

	public function getSocial(AuthenticateUser $authenticateUser, Request $request, $provider)
	{
		return $authenticateUser->execute($request->all(), $this, $provider);
	}

	public function loginSuccess(AuthenticatableContract $user)
	{
		$intended = Config::get('socialite-login.intended-redirect.success');
		return redirect()->intended($intended);
	}

	public function loginFailure($provider, \Exception $e = null)
	{
		$intended = Config::get('socialite-login.intended-redirect.failure');
		return redirect()->intended($intended);
	}

}
