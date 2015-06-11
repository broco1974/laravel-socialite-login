Laravel Socialite Login
=======================

Purpose
-------

Simplifies exposing Laravel's baked in Socialite functionality.


Instructions
------------

Include as a trait in _app/Http/Controllers/Auth/AuthController.php_.

```
use Broco\SocialiteLogin\Auth\AuthenticatesSocialiteLogin;
class AuthController extends Controller {
	use AuthenticatesSocialiteLogin;
}
```

Optionally configure:

* _socialite-login.userclass_: The class to use as the application's user object.
* _socialite-login.intended-redirect.success_: Redirect url on login success.
* _socialite-login.intended-redirect.failure_: Redirect url on login failure.
* _socialite-login.limit-access.*_: Access rules (e.g. limit to email domain).

References
----------

Inspiration Guide: http://www.codeanchor.net/blog/complete-laravel-socialite-tutorial/  
Boilerplate: https://github.com/cviebrock/laravel5-package-template  
