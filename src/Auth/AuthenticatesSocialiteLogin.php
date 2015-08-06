<?php namespace Broco\SocialiteLogin\Auth;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

trait AuthenticatesSocialiteLogin {

	public function getSocial(AuthenticateUser $authenticateUser, Request $request, $provider)
	{
        $allowedProviders = (array) config('socialite-login.allowed-providers');
        if (!in_array($provider, $allowedProviders)) {
            abort(404);
        }

		return $authenticateUser->execute($request->all(), $this, $provider);
	}

	public function loginSuccess(AuthenticatableContract $user)
	{
		$redirect = Config::get('socialite-login.intended-redirect.success');
		return redirect($redirect);
	}

	public function loginFailure($provider, \Exception $e = null)
	{
        $redirect = Config::get('socialite-login.intended-redirect.failure');
		return redirect($redirect);
	}

}
