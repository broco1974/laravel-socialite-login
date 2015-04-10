<?php namespace Broco\SocialiteLogin\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;

class UserSocialite extends Model {

	protected $table = 'users_socialite';
	protected $fillable = ['provider','provider_id','nickname','name','email','avatar'];

	protected function initializeUser()
	{
		$UserClass = Config::get('socialite-login.userclass');
		$user = $UserClass::firstOrNew(['email'=>$this->email]);
		if (!$user->exists)
		{
			$user->name = $this->name;
			$user->email = $this->email;
			$user->password = '';
			$user->save();
		}
		$this->user_id = $user->id;
	}

	public function initialize(SocialiteUserContract $userData)
	{
		if ($this->exists)
		{
			return;
		}

		$this->nickname = $userData->nickname;
		$this->name     = $userData->name;
		$this->email    = $userData->email;
		$this->avatar   = $userData->avatar;

		$this->initializeUser();

		$this->save();
	}

	public function updateIfNecessary(SocialiteUserContract $userData)
	{
		$providerData = [
			'nickname' => $userData->nickname,
			'email'    => $userData->email,
			'name'     => $userData->name,
			'avatar'   => $userData->avatar,
		];
		$modelData = [
			'nickname' => $this->nickname,
			'email'    => $this->email,
			'name'     => $this->name,
			'avatar'   => $this->avatar,
		];

		if ($diff = array_diff($providerData, $modelData))
		{
			$this->fill($diff);
			$this->save();
			$this->user->fill($diff);
			$this->user->save();
		}
	}

	public function initializeOrUpdateIfNecessary(SocialiteUserContract $userData)
	{
		if ($this->exists)
		{
			$this->updateIfNecessary($userData);
		}
		else
		{
			$this->initialize($userData);
		}
	}

	public function user()
	{
		return $this->belongsTo(Config::get('socialite-login.userclass'));
	}

}